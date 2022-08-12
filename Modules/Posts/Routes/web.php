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

// Route::prefix('posts')->group(function() {
//     Route::get('PostsController@index');
//     Route::get('/create', 'PostsController@create');
// });

Route::get('/posts', 'PostsController@index')->middleware(['auth:sanctum', 'verified'])->name('posts.index');
Route::get('/posts/create', 'PostsController@create')->name('posts.create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
Route::delete('/posts/{id}', 'PostsController@destroy')->name('posts.destroy');
Route::get('/posts/{id}/edit', 'PostsController@edit')->name('posts.edit');
Route::put('/posts/{id}', 'PostsController@update');

Route::controller(UsersController::class)->middleware('role:admin')->group(function() {
    Route::delete('/users/{id}', 'destroy')->name('users.destroy');
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users', 'store')->name('users.store');
    Route::get('/users/{id}/edit', 'edit')->name('user.edit');
    Route::put('/users/{id}', 'update');
});