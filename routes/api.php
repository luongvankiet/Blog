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
    Route::get('refresh', 'ApiControllers\Auth\AuthController@refresh');
    Route::get('me', 'ApiControllers\Auth\AuthController@me');
    Route::post('payload', 'ApiControllers\Auth\AuthController@payload');
    Route::post('resetpassword', 'ApiControllers\Auth\ResetPasswordController@resetPassword');
    Route::post('changepassword', 'ApiControllers\Auth\ResetPasswordController@changePassword');
});

Route::group([
    'middleware' => 'api',
], function () {
    Route::apiresource('users', 'ApiControllers\Users\UserController');
    Route::apiresource('posts', 'ApiControllers\Posts\PostController')->except('show');
    Route::apiresource('comments', 'ApiControllers\Comments\CommentController');
    Route::apiresource('categories', 'ApiControllers\Categories\CategoryController')->except('show');
    Route::apiresource('images', 'ApiControllers\Images\ImageController');
    Route::get('/categories/{slug}', 'ApiControllers\Categories\CategoryController@show');
    Route::get('/popular-posts', 'ApiControllers\Posts\PostController@popularPosts');
    Route::get('/newPosts', 'ApiControllers\Posts\PostController@newPosts');
    Route::get('category/{id}/posts', 'ApiControllers\Posts\PostController@showPostsByCategory');
    Route::get('/search', 'ApiControllers\Posts\PostController@search');
    Route::get('/roles', 'ApiControllers\Users\UserController@getRoles');
    Route::post('/roles', 'ApiControllers\Users\UserController@createRoles');
    Route::get('/permissions', 'ApiControllers\Users\UserController@getPermissions');
    Route::get('/getAvatar/{id}', 'ApiControllers\Images\ImageController@getAvatar');
    Route::put('/setAvatar/{id}', 'ApiControllers\Images\ImageController@setAvatar');
    Route::get('/getCoverImage/{id}', 'ApiControllers\Images\ImageController@getCoverImage');
    Route::put('/setCoverImage/{id}', 'ApiControllers\Images\ImageController@setCoverImage');
    Route::get('/childrenComments/{id}', 'ApiControllers\Comments\CommentController@showChildrenComments');
    Route::get('/likes_dislikes/{post_id}', 'ApiControllers\Posts\PostController@likes_dislikes');
    Route::post('/likes_dislikes/', 'ApiControllers\Posts\PostController@updateLikeDisLike');
    Route::get('/count/{post_id}', 'ApiControllers\Posts\PostController@countLikeDislike');
});
