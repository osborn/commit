<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::post('developers/search', 'DeveloperController@search');

Route::post('developers/signin', 'DeveloperController@signin');

Route::get('developers/logout', 'DeveloperController@logout');

Route::resource('developers', 'DeveloperController');

Route::resource('jobs', 'JobController');