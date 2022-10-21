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
    return view('index');
})->name('/');

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::post('/visitor_invitation', [App\Http\Controllers\Index\VisitorController::class, 'storyVisitorInvitation'])->name('visitor_invitation');

Auth::routes();
Route::middleware(['visitor'])->group(function (){
    Route::get('/home', [App\Http\Controllers\Index\IndexController::class, 'index'])->name('home');
    Route::post('/add_comments', [App\Http\Controllers\Index\IndexController::class, 'storyComments'])->name('add_comentario');
});

Auth::routes();
Route::middleware(['admin'])->group(function (){
    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::post('/novo_album', [App\Http\Controllers\Admin\AdminController::class, 'storeAlbum'])->name('novo_album');
    Route::delete('/delete_album/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroyAlbum'])->name('delete_album');
    Route::post('/novo_tema', [App\Http\Controllers\Admin\AdminController::class, 'storeTheme'])->name('novo_tema');
    Route::delete('/excluir_tema/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroyTheme'])->name('excluir_tema');
    Route::put('/editar_tema/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateTheme'])->name('editar_tema');
    Route::post('/nova_foto', [App\Http\Controllers\Admin\AdminController::class, 'storePhoto'])->name('nova_foto');
    Route::delete('/delete_photo/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroyPhoto'])->name('delete_photo');
    Route::delete('/delete_comment/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroyComment'])->name('delete_comment');
    Route::get('/visitor-user/', [App\Http\Controllers\Admin\AdminController::class, 'getVisitorUser'])->name('visitor-user');
    Route::post('/create_visitor_user/', [App\Http\Controllers\Admin\AdminController::class, 'create'])->name('create_visitor_user');
    Route::get('/visitor_user', function () {
        return view('/visitor_user');
    });


});
