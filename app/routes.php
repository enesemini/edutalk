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
	$user = DB::table('users')->find(1);

    return $user -> username;
});

Route::resource('talks', 'TalksController');

Route::resource('users', 'UsersController');