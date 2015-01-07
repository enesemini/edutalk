<?php



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

Route::get('test', function()
{
	$user = User::find(1);

    return dd($user->isInGroup(7));


});


/* Startseite */
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home', 'before' => 'guest']);
Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'PagesController@dashboard', 'before' => 'auth']);

Route::get('/über-edutalk', ['as' => 'about', 'uses' => 'PagesController@about']);
Route::get('/impressum', ['as' => 'impressum', 'uses' => 'PagesController@impressum']);

/* Login Routes */
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login', 'before' => 'guest']);
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

/* Registration Routes */
Route::get('registrieren', ['as' => 'register', 'uses' => 'AuthController@register', 'before' => 'guest']);
Route::post('registrieren', ['as' => 'register', 'uses' => 'AuthController@postRegister']);

Route::get('aktivieren/{code}', ['as' => 'activate', 'uses' => 'UserController@activate', 'before' => 'guest']);

/* Talk Routes */
Route::resource('talks', 'TalksController');

/* Group Routes */
Route::resource('groups', 'GroupsController');
Route::get('/gruppen', ['as' => 'groups.index', 'uses' => 'GroupsController@index', 'before' => 'auth']);
Route::get('/g/erstellen', ['as' => 'groups.create', 'uses' => 'GroupsController@create', 'before' => 'auth']);
Route::get('/g/{id}', ['as' => 'groups.show', 'uses' => 'GroupsController@show', 'before' => 'auth']);
Route::get('/g/{id}/beitreten', ['as' => 'groups.enterGroup', 'uses' => 'GroupsController@enterGroup', 'before' => 'auth']);
Route::get('/g/{id}/akzeptieren', ['as' => 'groups.acceptInvitation', 'uses' => 'GroupsController@acceptInvitation', 'before' => 'auth']);
Route::get('/g/{id}/ablehnen', ['as' => 'groups.declineInvitation', 'uses' => 'GroupsController@declineInvitation', 'before' => 'auth']);
Route::get('/g/{id}/verlassen', ['as' => 'groups.leaveGroup', 'uses' => 'GroupsController@leaveGroup', 'before' => 'auth']);
Route::post('/g/einladen', ['as' => 'group.invite', 'uses' => 'GroupsController@invite', 'before' => 'auth']);
Route::get('/g/{id}/mitglieder', ['as' => 'group.members', 'uses' => 'GroupsController@members', 'before' => 'auth']);

/* Follow Routes */
Route::get('follow/{username}', ['as' => 'follow', 'uses' => 'FollowController@follow', 'before' => 'auth']);
Route::get('unfollow/{username}', ['as' => 'unfollow', 'uses' => 'FollowController@unfollow', 'before' => 'auth']);


/* User Routes */
Route::resource('users', 'UsersController');


Route::get('/@{username?}', ['as' => 'users.show', 'uses' => 'UsersController@show', 'before' => 'auth']);
Route::get('/@{username?}/following', ['as' => 'user.following', 'uses' => 'FollowController@user_following', 'before' => 'auth']);
Route::get('/@{username?}/followers', ['as' => 'user.followers', 'uses' => 'FollowController@user_followers', 'before' => 'auth']);

Route::get('/@{username?}/edit', ['as' => 'user.edit', 'uses' => 'UserController@edit', 'before' => 'auth']);
Route::post('/@{username?}/update', ['as' => 'user.update', 'uses' => 'UserController@update', 'before' => 'auth']);
Route::get('/{id}/delete', ['as' => 'user.delete', 'uses' => 'UserController@delete', 'before' => 'auth']);

Route::post('/upload', ['as' => 'uploadImage', 'uses' => 'UploadsController@uploadImage', 'before' => 'auth']);



/* Test Routes */
