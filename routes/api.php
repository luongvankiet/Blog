<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'ApiControllers\Auth\AuthController@login');
    Route::post('register', 'ApiControllers\Auth\AuthController@register');
    Route::post('logout', 'ApiControllers\Auth\AuthController@logout');
    Route::post('refresh', 'ApiControllers\Auth\AuthController@refresh');
    Route::post('me', 'ApiControllers\Auth\AuthController@me');
    Route::post('payload', 'ApiControllers\Auth\AuthController@payload');
    Route::post('resetpassword', 'ApiControllers\Auth\ResetPasswordController@resetPassword');
    Route::post('changepassword', 'ApiControllers\Auth\ResetPasswordController@changePassword');

});

Route::apiresource('posts', 'ApiControllers\Posts\PostController');
Route::apiresource('categories', 'ApiControllers\Categories\CategoryController')->except('show');
Route::apiresource('images', 'ApiControllers\Images\ImageController');
Route::get('/categories/{slug}/{id}', 'ApiControllers\Categories\CategoryController@show');
Route::get('/popular-posts', 'ApiControllers\Posts\PostController@popularPosts');
