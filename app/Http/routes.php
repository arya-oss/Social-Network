<?php

Route::group(['middleware' => ['web']], function () {
/*
 * Home Routing
 */
Route::get('/', [
	'uses'=>'\App\Http\Controllers\HomeController@index',
	'as'=>'home'
]);

Route::resource('tasks', 'TasksController');
/*
 * Auth Routing
 */
Route::get('/signup', [
	'uses' => '\App\Http\Controllers\AuthController@getSignup',
	'as'   => 'auth.signup',
	'middleware' => ['guest']
]);
Route::post('/signup', [
	'uses' => '\App\Http\Controllers\AuthController@postSignup',
	'middleware' => ['guest']
]);
Route::get('/signin', [
	'uses' => '\App\Http\Controllers\AuthController@getSignin',
	'as'   => 'auth.signin',
	'middleware' => ['guest']
]);
Route::post('/signin', [
	'uses' => '\App\Http\Controllers\AuthController@postSignin',
	'middleware' => ['guest']
]);
Route::get('/signout', [
	'uses' => '\App\Http\Controllers\AuthController@getSignout',
	'as'   => 'auth.signout'
]);
/*
 * Search Routing
 */
Route::get('/search', [
	'uses'  => '\App\Http\Controllers\SearchController@getResults',
	'as'    => 'search.results'
]);
/*
 * User Profile
 */
Route::get('/user/{username}', [
	'uses'  => '\App\Http\Controllers\ProfileController@getProfile',
	'as'    => 'profile.index'
]);
Route::get('/profile/edit', [
	'uses'  => '\App\Http\Controllers\ProfileController@getEdit',
	'as'    => 'profile.edit',
	'middleware' => ['auth']
]);
Route::post('/profile/edit', [
	'uses'  => '\App\Http\Controllers\ProfileController@postEdit',
	'middleware' => ['auth']
]);
/*
 * Friend Routes
 */
Route::get('/friends', [
	'uses'  => '\App\Http\Controllers\FriendController@getIndex',
	'as'	=> 'friends.index',
	'middleware' => ['auth']
]);
Route::get('/friends/add/{username}', [
	'uses'  => '\App\Http\Controllers\FriendController@getAdd',
	'as'	=> 'friends.add',
	'middleware' => ['auth']
]);
Route::get('/friends/accept/{username}', [
	'uses'  => '\App\Http\Controllers\FriendController@getAccept',
	'as'	=> 'friends.accept',
	'middleware' => ['auth']
]);
Route::post('/friends/delete/{username}', [
	'uses'  => '\App\Http\Controllers\FriendController@postDelete',
	'as'	=> 'friends.delete',
	'middleware' => ['auth']
]);
/*
 * Status Routing 
 */
Route::post('/status', [
	'uses'  => '\App\Http\Controllers\StatusController@postStatus',
	'as'	=> 'status.post',
	'middleware' => ['auth']
]);
Route::post('/status/{statusId}/reply', [
	'uses'  => '\App\Http\Controllers\StatusController@postReply',
	'as'	=> 'status.reply',
	'middleware' => ['auth']
]);
Route::get('/status/{statusId}/like', [
	'uses'  => '\App\Http\Controllers\StatusController@getLike',
	'as'	=> 'status.like',
	'middleware' => ['auth']
]);
});
