<?php

use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    /*--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------*/
    Route::resource('user', UserController::class);
    Route::get('user/{id}/json-detail-user', [App\Http\Controllers\UserController::class, 'apiDetailUser']);
    Route::get('user/{id}/edit-photo', [App\Http\Controllers\UserController::class, 'editPhoto'])->name('edit-photo');
    Route::put('user/{id}/update-photo', [App\Http\Controllers\UserController::class, 'updatePhoto'])->name('update-photo');
    
    /*--------------------------------------------------------------------------
    | Request Routes
    |--------------------------------------------------------------------------*/
    Route::resource('requests', RequestController::class);
    Route::get('requests/{id}/json-detail-requests', [App\Http\Controllers\RequestController::class, 'apiDetailRequests']);
});
