<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

Route::get('test', function()
{
	$users = DB::table('users')->find(1);

    return $users -> username;
});

/* Startseite */
Route::get('/', array('as' => 'home', 'uses' => 'PagesController@home'));

/* Login Routes */
Route::get('login', array('as' => 'login', 'uses' => 'AuthController@login'));
Route::post('login', array('as' => 'login', 'uses' => 'AuthController@postLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));

/* Registration Routes */
Route::get('register', array('as' => 'register', 'uses' => 'AuthController@register'));
Route::post('register', array('as' => 'register', 'uses' => 'AuthController@postRegister'));

/* Talk Routes */
Route::resource('talks', 'TalksController');

Route::resource('users', 'UsersController');

Route::resource('groups', 'GroupsController');