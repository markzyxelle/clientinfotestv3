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

// Route::get('/notAuthenticated', 'WelcomeController@notAuthenticated');
// Route::get('/notApproved', 'WelcomeController@notApproved');

Route::post('authenticate', 'AuthenticateController@authenticate');

Route::post('changePassword', 'ResourceController@changePassword');

Route::get('dashboard', 'ResourceController@dashboard');

Route::get('loans', 'ResourceController@loans');