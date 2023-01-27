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

// auth routes
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['prefix' => 'admin', 'middleware' => ['auth','is_admin']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('articles', App\Http\Controllers\Admin\ArticleController::class);
    Route::post('comments', [App\Http\Controllers\Admin\CommentController::class, 'create'])->name('comments.store');
    Route::delete('comments/{id}', [App\Http\Controllers\Admin\CommentController::class, 'delete'])->name('comments.destroy');
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
