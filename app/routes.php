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
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

/* Login Routes */
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

/* Registration Routes */
Route::get('register', ['as' => 'register', 'uses' => 'AuthController@register']);
Route::post('register', ['as' => 'register', 'uses' => 'AuthController@postRegister']);

/* Talk Routes */
Route::resource('talks', 'TalksController');

Route::resource('users', 'UsersController');

Route::resource('groups', 'GroupsController');

/* Follow Routes */
Route::get('follow/{username}', ['as' => 'follow', 'uses' => 'FollowController@follow']);
Route::get('unfollow/{username}', ['as' => 'unfollow', 'uses' => 'FollowController@unfollow']);


/* User Routes */
Route::get('/@{username?}', ['as' => 'users.show', 'uses' => 'UsersController@show']);

Route::get('/@{username?}/following', ['as' => 'user.following', 'uses' => 'FollowController@user_following']);
Route::get('/@{username?}/followers', ['as' => 'user.followers', 'uses' => 'FollowController@user_followers']);

Route::get('/@{username?}/edit', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
Route::post('/@{username?}/update', ['as' => 'user.update', 'uses' => 'UserController@update']);


Route::post('/upload', ['as' => 'uploadImage', 'uses' => 'UploadsController@uploadImage']);


/* Test Routes */
Route::get('test', function()
{
    $user = User::find(11);

    return $user->follow(9);

    //return dd($user->follow());
});

Route::get('test2', function()
{
    $user = User::find(9);

    $user->follow(13);

    //return User::with('groups')->find(9);


});