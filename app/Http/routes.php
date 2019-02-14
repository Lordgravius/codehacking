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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin', function() {
    return view('admin.index');
});

Route::resource('admin/users', 'AdminUsersController');
// Ez valamiért nem akart működni a resource routeon belül.
// Update helyett a show methodra irányított át.
Route::post('admin/users/{id}/update', 'AdminUsersController@update');