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
Route::get('/app/{id}', 'SilsilahController@index');
Route::get('/app_home/', 'SilsilahController@home');
Route::get('admin', 'AdminController@index');
Route::any('admin/add', 'AdminController@add');
Route::any('admin/edit/{id}', 'AdminController@edit')->where('id', '[0-9]+');
Route::get('admin/delete/{id}', 'AdminController@delete')->where('id', '[0-9]+');
Route::get('admin/aksesdariwp/{kunci}', 'AdminController@aksesdariwp');


Route::get('tidakbolehmasuk', function () {
    return 'Anda tidak boleh masuk ke halaman ini.';
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
