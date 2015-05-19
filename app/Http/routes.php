<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//sprint routes
Route::get('/sprint/add/show', [
    'as' => '/sprint/add/show',
    'uses' => 'SprintController@addShow'
]);

Route::post('/sprint/add/show', 'SprintController@getAddInputs');

//task routes
Route::get('/task/add/show', [
    'as' => '/task/add/show',
    'uses' => 'TaskController@addShow'
]);

Route::post('/task/add/show', 'TaskController@getAddInputs');

//scrumboard routes
Route::get('/scrumboard', 'ScrumBoardController@show');
Route::get('/scrumboard/update', 'ScrumBoardController@updateTask');