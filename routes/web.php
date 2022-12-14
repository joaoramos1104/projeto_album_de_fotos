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
    return view('app.index');
})->name('/');

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/reset-password', function () {
    return view('auth/passwords/email');
})->name('reset-password');


Route::post('/visitor_invitation', [App\Http\Controllers\Index\VisitorController::class, 'storyVisitorInvitation'])->name('visitor_invitation');

Auth::routes();
Route::middleware(['visitor'])->group(function (){
    Route::get('/home', [App\Http\Controllers\Index\IndexController::class, 'index'])->name('home');
    Route::post('/add_comments', [App\Http\Controllers\Index\IndexController::class, 'storyComments'])->name('add_comentario');
    Route::get('/show_comments/{id}', [App\Http\Controllers\Index\IndexController::class, 'showComments'])->name('show_comments');

});

Auth::routes();
Route::middleware(['admin'])->group(function (){
    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::post('/new_album', [App\Http\Controllers\Admin\AdminController::class, 'storeAlbum'])->name('novo_album');
    Route::delete('/delete_album/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroyAlbum'])->name('delete_album');
    Route::get('/new_theme/{id}', [App\Http\Controllers\Admin\AdminController::class, 'newTheme'])->name('new_theme');
    Route::post('/new_theme', [App\Http\Controllers\Admin\AdminController::class, 'storeTheme'])->name('novo_tema');
    Route::get('/new_theme/', function () {
        return view('/app.404');
    });

    Route::delete('/delete_tema/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroyTheme'])->name('excluir_tema');
    Route::put('/edit_theme/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateTheme'])->name('editar_tema');
    Route::get('/edit_theme/{id}', [App\Http\Controllers\Admin\AdminController::class, 'getTheme'])->name('get-theme');

    Route::post('/new_photo', [App\Http\Controllers\Admin\AdminController::class, 'storePhoto'])->name('nova_foto');
    Route::delete('/delete_photo/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroyPhoto'])->name('delete_photo');
    Route::delete('/delete_comment/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroyComment'])->name('delete_comment');
    Route::get('/visitors-users/', [App\Http\Controllers\Admin\AdminController::class, 'getVisitorsUsers'])->name('visitors-users');
    Route::post('/create_visitor_user/', [App\Http\Controllers\Admin\AdminController::class, 'create'])->name('create_visitor_user');

    Route::get('/visitors_users', function () {
        return view('/admin.visitors_users');
    })->name('visitors_users');


    Route::get('/edit_visitor_user/{id}', [App\Http\Controllers\Admin\AdminController::class, 'editVisitorUser'])->name('edit_visitor_user');
    Route::put('/update_visitor_user/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateVisitorUser'])->name('update_visitor_user');

});
