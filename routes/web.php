<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'auth' => auth()->user()->hasRole('admin'),
        'dashboard' => true,
    ]);
})->name('dashboard');


// Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified'])->group(function () {
//     Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
// });

// Route::prefix('admin')->middleware('auth:sanctum')->name('admin.')->group(function () {
//     Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
// });