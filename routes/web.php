<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FiturController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class, 'index']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'create']);
Route::post('signup', [AuthController::class, 'register']);
Route::post('signin', [AuthController::class, 'authent']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('home', [HomeController::class, 'index']);

// admin
Route::get('admin', [PagesController::class, 'index'])->middleware('auth');
Route::get('dashboard', [FiturController::class, 'index']);
// pages
Route::get('page', [PagesController::class, 'index'])->name('pages')->middleware('auth');
Route::get('page/create', [PagesController::class, 'create'])->name('pages.create')->middleware('auth');
Route::get('page/edit/{id}', [PagesController::class, 'edit'])->name('pages.edit')->middleware('auth');
Route::get('page/detail/{id}', [PagesController::class, 'show'])->name('pages.show')->middleware('auth');
Route::post('page/store', [PagesController::class, 'store'])->name('pages.store')->middleware('auth');
Route::post('page/update/{id}', [PagesController::class, 'update'])->name('pages.update')->middleware('auth');
Route::get('page/delete/{id}', [PagesController::class, 'destroy'])->name('pages.destroy')->middleware('auth');
