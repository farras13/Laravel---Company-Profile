<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::get('/register', [AuthController::class, 'create']);
Route::post('/signup', [AuthController::class, 'register']);
Route::post('/signin', [AuthController::class, 'authent']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::resource('pages', PagesController::class);
