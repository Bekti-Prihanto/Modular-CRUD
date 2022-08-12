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

// Route::prefix('categories')->group(function() {
//     Route::get('/', 'CategoriesController@index');
// });

Route::controller(CategoriesController::class)->group(function() {
    Route::delete('/categories/{id}', 'destroy')->name('categories.destroy');
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/create', 'create')->name('categories.create');
    Route::post('/categories', 'store')->name('categories.store');
    Route::get('/categories/{id}/edit', 'edit')->name('user.edit');
    Route::put('/categories/{id}', 'update');
});
