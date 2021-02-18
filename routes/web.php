<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdvertController;

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

Route::get('/', [AdvertController::class, 'showSingleAdvert']);

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::get('/upload', [AdvertController::class, 'create'])->name('upload');
Route::post('/upload', [AdvertController::class, 'store']);
// Route::get('/edit_advert/{id}',[AdvertController::class, 'editAdvert'])->name('editadvert');
// Route::post('/edit_advert',[AdvertController::class, 'updateTeacher']);
Route::get('/delete_advert/{id}',[AdvertController::class, 'delete']);
