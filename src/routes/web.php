<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Resource\AuthController;
use App\Http\Controllers\Resource\UserController;
use App\Http\Controllers\Resource\PlaceController;
use App\Http\Controllers\Resource\SettingController;
use App\Http\Controllers\Resource\CategoryController;
use App\Http\Controllers\Resource\DashboardController;
use App\Http\Controllers\Resource\InventoryController;

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

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

// Authentication
Route::get('/login', [AuthController::class, 'indexLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'indexRegister'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);

// Resource
Route::resource('/category', CategoryController::class)->middleware('auth');
Route::resource('/place', PlaceController::class)->middleware('auth');
Route::resource('/setting', SettingController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');
Route::resource('/inventory', InventoryController::class)->middleware('auth');

// File Input
Route::get('/importFile', [InventoryController::class, 'importFile'])->middleware('auth');
Route::post('/importFile', [InventoryController::class, 'import'])->middleware('auth');
// Print QR
Route::get('/cetakqr/{id}', [InventoryController::class, 'print'], function ($id) {
    return $id;
})->middleware('auth');
Route::get('/locationqr/{id}', [PlaceController::class, 'print'], function ($id) {
    return $id;
})->middleware('auth');
