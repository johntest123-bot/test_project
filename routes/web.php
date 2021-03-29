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
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/{slug}', 'HomeController@show')->name('show');

// Route::post('/create-comment', 'PostsController@store');
Route::get('/tag/{id}', 'TagsController@show')->name('tag.show');
Route::get('/change-password', 'UserController@showChangePasswordForm');
Route::post('/change-password', 'UserController@changePassword');

Route::resource('comments', 'CommentController')->only(['store']);
Route::post('comments/reply', 'CommentController@reply')->name('comments.reply');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'admin', 'middleware' => 'admin'], function () {
   
    Route::resource('types', 'TypesController');
    Route::resource('articles', 'ArticlesController');
    Route::resource('tags', 'TagsController');
    Route::resource('users', 'UsersController')->only(['index', 'edit', 'update']);
    Route::get('/list', 'UsersController@admins')->name('user.admins.list');
    Route::get('/change-password', 'UsersController@showChangePasswordForm');
    Route::post('/change-password', 'UsersController@changePassword')->name('current.change_password');
    Route::delete('/user/{id}', 'UsersController@destroy')->name('user.delete');
    Route::post('/user/{id}', 'UsersController@edit_role')->name('user.demote');
    Route::get('/home', 'UsersController@admins');
});
