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
    return redirect('posts');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('manage')->group(function(){
	Route::get("/","Admin\ManageController@index");
	Route::get("dashboard",'Admin\ManageController@dashboard')->name('manage.dashboard');
	Route::resource("users","Admin\UserController");
	Route::resource("permissions", "Admin\PermissionController");
	Route::resource("roles", "Admin\RoleController");
	Route::resource("manage_posts", "Admin\PostController");
	Route::resource("categories", "Admin\CategoryController");


});

Route::resource('posts','PostController')->except('show');
Route::resource('comments','CommentController');
Route::get('posts/{slug}/{id}', 'PostController@show')->name('posts.show');
Route::get('posts/category/{slug}/{id}', 'HomeController@showPostByCategory')->name('posts.category');
Route::get("profile/{id}", "HomeController@profile")->name('profile');
Route::get("profile/{id}/edit", "HomeController@editProfile")->name('profile.edit');
Route::put("profile/{id}", "HomeController@updateProfile")->name('profile.update');
Route::get('search', 'PostController@search')->name('search');