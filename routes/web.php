<?php

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


Route::get('/', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Auth::routes();
Route::middleware(['visitor'])->group(function (){
    Route::get('/home', [App\Http\Controllers\Index\IndexController::class, 'index'])->name('home');
});

Auth::routes();
Route::middleware(['admin'])->group(function (){
    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
});
