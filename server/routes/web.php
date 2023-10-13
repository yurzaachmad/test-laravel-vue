<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/major', [App\Http\Controllers\HomeController::class, 'pageMajor'])->name('major');

Route::get('/dosen', [App\Http\Controllers\HomeController::class, 'pageDosen'])->name('dosen');

Route::get('/study', [App\Http\Controllers\HomeController::class, 'pageStudy'])->name('study');

Route::get('/contract', [App\Http\Controllers\HomeController::class, 'pageContract'])->name('contract');

Route::get('/addstudy', [App\Http\Controllers\HomeController::class, 'addStudy'])->name('addstudy');

Route::get('/addmajor', [App\Http\Controllers\HomeController::class, 'addMajor'])->name('addmajor');

Route::get('/adddosen', [App\Http\Controllers\HomeController::class, 'addDosen'])->name('adddosen');

Route::get('/addcontract', [App\Http\Controllers\HomeController::class, 'addContract'])->name('addcontract');


