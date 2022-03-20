<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GoodController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('posts', PostController::class)->only(['create', 'edit', 'update', 'store', 'destroy'])->middleware('auth');
Route::resource('posts', PostController::class)->only(['index']);
Route::resource('goods', GoodController::class)->only(['store', 'destroy'])->middleware('auth');
