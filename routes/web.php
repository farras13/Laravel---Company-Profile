<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FiturController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TestimoniController;
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

// testimoni
Route::get('testimoni', [TestimoniController::class, 'index'])->name('testi')->middleware('auth');
Route::get('testimoni/create', [TestimoniController::class, 'create'])->name('testi.create')->middleware('auth');
Route::get('testimoni/edit/{id}', [TestimoniController::class, 'edit'])->name('testi.edit')->middleware('auth');
Route::get('testimoni/detail/{id}', [TestimoniController::class, 'show'])->name('testi.show')->middleware('auth');
Route::post('testimoni/store', [TestimoniController::class, 'store'])->name('testi.store')->middleware('auth');
Route::post('testimoni/update/{id}', [TestimoniController::class, 'update'])->name('testi.update')->middleware('auth');
Route::get('testimoni/delete/{id}', [TestimoniController::class, 'destroy'])->name('testi.destroy')->middleware('auth');

// feature
Route::get('feature', [FiturController::class, 'index'])->name('fitur')->middleware('auth');
Route::get('feature/create', [FiturController::class, 'create'])->name('fitur.create')->middleware('auth');
Route::get('feature/edit/{id}', [FiturController::class, 'edit'])->name('fitur.edit')->middleware('auth');
Route::get('feature/detail/{id}', [FiturController::class, 'show'])->name('fitur.show')->middleware('auth');
Route::post('feature/store', [FiturController::class, 'store'])->name('fitur.store')->middleware('auth');
Route::post('feature/update/{id}', [FiturController::class, 'update'])->name('fitur.update')->middleware('auth');
Route::get('feature/delete/{id}', [FiturController::class, 'destroy'])->name('fitur.destroy')->middleware('auth');

// service
Route::get('services', [ServicesController::class, 'index'])->name('services')->middleware('auth');
Route::get('service/create', [ServicesController::class, 'create'])->name('services.create')->middleware('auth');
Route::get('service/edit/{id}', [ServicesController::class, 'edit'])->name('services.edit')->middleware('auth');
Route::get('service/detail/{id}', [ServicesController::class, 'show'])->name('services.show')->middleware('auth');
Route::post('service/store', [ServicesController::class, 'store'])->name('services.store')->middleware('auth');
Route::post('service/update/{id}', [ServicesController::class, 'update'])->name('services.update')->middleware('auth');
Route::get('service/delete/{id}', [ServicesController::class, 'destroy'])->name('services.destroy')->middleware('auth');

// portofolio
Route::get('portofolios', [PortofolioController::class, 'index'])->name('portofolio')->middleware('auth');
Route::get('portofolio/create', [PortofolioController::class, 'create'])->name('portofolio.create')->middleware('auth');
Route::get('portofolio/edit/{id}', [PortofolioController::class, 'edit'])->name('portofolio.edit')->middleware('auth');
Route::get('portofolio/detail/{id}', [PortofolioController::class, 'show'])->name('portofolio.show')->middleware('auth');
Route::post('portofolio/store', [PortofolioController::class, 'store'])->name('portofolio.store')->middleware('auth');
Route::post('portofolio/update/{id}', [PortofolioController::class, 'update'])->name('portofolio.update')->middleware('auth');
Route::get('portofolio/delete/{id}', [PortofolioController::class, 'destroy'])->name('portofolio.destroy')->middleware('auth');
