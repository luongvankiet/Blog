<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('manage')->middleware('role:superadministrator|administrator|author|publisher')->group(function(){
	Route::get("/","ManageController@index");
	Route::get("dashboard",'ManageController@dashboard')->name('manage.dashboard');
	Route::resource("users","UserController");
	Route::resource("permissions", "PermissionController");
});
