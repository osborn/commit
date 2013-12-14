@extends('layout')

@section('nav')
<!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to('/') }}">Commit</a>
        </div>
        <div class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ URL::to('developers') }}">Find Developers</a></li>
            <li class="dropdown">
              @if(Auth::check())
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="{{ URL::to('developers/' . Auth::user()->id) }}" data-toggle="modal">Profile</a></li>
                <li><a href="{{ URL::to('developers/logout') }}" data-toggle="modal">Logout</a></li>
              @else
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Developers<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <!-- Anchor to trigger modal -->
                  <li><a href="#myModal" data-toggle="modal">Log In or Register</a></li>
              @endif
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

@section('content')
<h1>All developers</h1>

<div class="row">
	<div class="col-md-4">
		<h3>Search Developers</h3>
		{{ Form::open(array('url' => 'developers/search')) }}
		    <div class="form-group">
		      {{ Form::label('city', 'City') }}
		      {{ Form::select('city', array('Other' => 'Select a City', 'Accra' => 'Accra', 'Kumasi' => 'Kumasi', 'Cape Coast' => 'Cape Coast', 'Tamale' => 'Tamale', 'Takoradi' => 'Takoradi', 'Ho' => 'Ho'), Input::old('city'), array('class' => 'form-control')) }}
		    </div>

		    {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}

		  {{ Form::close() }}
	</div>
	<div class="col-md-8">
		@foreach($developer as $key => $value)
			<div class="row">
				@if($value->image_path)
			      <div class="col-md-4">
			        <a href="#" class="thumbnail">
			          <img src="{{ URL::asset($value->image_path) }}" alt="profile picture">
			        </a>
			      </div>
			    @else
			      <div class="col-md-4">
			        <a href="#" class="thumbnail">
			          <img src="{{ URL::asset('images/profile.jpeg') }}" alt="profile picture">
			        </a>
			      </div>
			    @endif

			    <div class="col-md-4">
			      <h3>{{ $value->name }}</h3>
			      <p>{{ $value->location }}</p>
			      <p>{{ $value->telephone }}</p>
			      <p><a class="btn btn-primary" href="{{ URL::to('developers/'.$value->id)}}" role="button">View details &raquo;</a></p>
			    </div>

			    <div class="col-md-4">
			      <?php
			        $skills = $value->skills;
			        $skill = explode(",", $skills);
			      ?>
			      @if($value->skills)
				      <ul class="list-group">
				        @foreach($skill as $skill_set)
				          <li class="list-group-item">{{ $skill_set }}</li>
				        @endforeach   
				      </ul>
			      @endif
			      <hr>
			    </div>
			</div>
		@endforeach

		{{ $developer->links(); }}
	</div>
</div>


@stop