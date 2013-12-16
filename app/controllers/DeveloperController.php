<?php

class DeveloperController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all developers
		$developer = User::paginate(5);

		// load the view and pass the developers
		return View::make('developers.index')->with('developer', $developer);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		// $query = Request::query('id');
		// if ($query) {
		// 	$developer = User::find($query);
		// 	$email = $developer->email;
		// 	return View::make('developers.create_2nd')->with('email', $email);
		// }
		return View::make('developers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		//validate
		$rules = array(
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required|alpha_num|between:6,12'
		);
		$validator = Validator::make(Input::all(), $rules);

		//process the login
		if ($validator->fails()) {
			return Redirect::to('developers/create')->withErrors($validator)->withInput(Input::except('password'));
			// I'll check later for users who have already signed in.
		}
		else {
			$developer = New User;
			$developer->name = Input::get('name');
			$developer->email = Input::get('email');
			$developer->location = Input::get('city');
			$developer->password = Hash::make(Input::get('password'));

			// checking if email is unique before saving
			$double_email = User::where('email', $developer->email)->get();
			foreach ($double_email as $email) {
				if ($double_email) {
					Session::flash('message', 'Someone already signed up with email address!');
					return Redirect::to('developers/create');
				}
			}

			$developer->save();

			$id=$developer->id;

			// sending a mail to user's inbox
			$user = array(
				'email' => $developer->email,
				'name' => $developer->name
			);

			$data = array('link' => 'http://localhost:8888/commit/public/developers/'.$id, 
					'name' => $user['name']);

			// Mail::send('emails.confirm', $data, function($message) use ($user)
			// 	{	
			// 	    $message->to($user['email'], $user['name'])->subject('Welcome to Commit');
			// 	});
			// redirect
			return Redirect::to('developers/'.$developer->id);
		}
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// get the developer
		$developer = User::find($id);

		//show the view and pass the developer to it
		return View::make('developers.show')
			->with('developer', $developer);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//get the developer
		$developer = User::find($id);

		// show the edit form and pass the deveoper
		return View::make('developers.edit')->with('developer', $developer);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
		// getting developer with id
		$developer = User::find($id);

		if (Input::get('type') == 'developer') {
			// validate
			$rules = array(
				'name' => 'required',
				'email' =>'required',
				'location' => 'required' 
			);
			$validator = Validator::make(Input::all(), $rules);

			// process the login
			if ($validator->fails()) {
				return Redirect::to('developers/'.$id.'/edit')->withErrors($validator)->withInput(Input::except('password'));
			} else {
				// store
				
				$developer->image_path = Input::get('image_path');
				$developer->name = Input::get('name');
				$developer->email = Input::get('email');
				$developer->location = Input::get('location');
				$developer->description = Input::get('description');
				$developer->skills = Input::get('skills');
				$developer->telephone = Input::get('telephone');

				//saving image
				if (Input::hasFile('image')){
					$file = Input::file('image');
					$destination = public_path().'/images/';
					$filename = str_random(6) . '_' . $file->getClientOriginalName();
					$uploadSuccess = $file->move($destination, $filename);
					$developer->image_path = 'images/' . $filename;
				}

				$developer->save();

				//redirect
				Session::flash('message', 'Successfully added Changes!');
				return Redirect::to('developers/'.$id.'/edit');
			} 
		} 
		elseif (Input::get('type') == 'education') {
			$education = new Education;
			$education->user_id = $developer->id;
			$education->school = Input::get('school');
			$education->course = Input::get('course');
			$education->start_month = Input::get('start_month');
			$education->start_year = Input::get('start_year');
			$education->end_month = Input::get('end_month');
			$education->end_year = Input::get('end_year');

			$education->save();
			//redirect
			Session::flash('message', 'Successfully added Changes!');
			return Redirect::to('developers/'.$id.'/edit');
		} else {
			$project = new Project;
			$project->user_id = $developer->id;
			$project->company = Input::get('company');
			$project->role = Input::get('role');
			$project->description = Input::get('description');
			$project->start_date = Input::get('start_date');
			$project->end_date = Input::get('end_date');
			$project->save();
			//redirect
			Session::flash('message', 'Successfully added Changes!');
			return Redirect::to('developers/'.$id.'/edit');
		}	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$developer = User::find($id);
		$developer->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the nerd!');
		return Redirect::to('developers');
	}

	public function signin(){
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			$id = Auth::user()->id;
		   return Redirect::to('developers/'.$id);
		} else {
			// I'll use ajax so that the page does not refresh
			return View::make('developers.signin')->with('message', 'Your username/password combination was incorrect');
		   //return Redirect::to('/')->with('message', 'Your username/password combination was incorrect');
		}
	}

	public function logout(){
		Auth::logout();
	   	return Redirect::to('/')->with('message', 'Your are now logged out!');
	}

	public function search(){
		$location = Input::get('city');
		$skills = Input::get('skills');
		$skillset = explode(",", $skills);
		$developers = User::where('location', $location)->paginate(10);
		$developer = array();
		foreach ($developers as $dev) {
			foreach ($skillset as $skill) {
				if (strpos(strtoupper($dev->skills), strtoupper($skill)) !==false) {
					array_push($developer, $dev);
					break;
				}
			}
		}

		if (count($developer == 0)) {
			Session::flash('message', 'No developer found with query parameters.');
		}
		return View::make('developers.index')->with('developer', $developer);
		
	}
}