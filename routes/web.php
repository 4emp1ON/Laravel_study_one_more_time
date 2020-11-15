<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
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
    return redirect('news');
});

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])
        ->name('news');
    Route::get('/{id}', [NewsController::class, 'show'])
        ->name('news.show')
        ->where('id', '[0-9]+');
    Route::get('/create', [NewsController::class, 'create'])
        ->name('news.create');
    Route::post('/store', [NewsController::class, 'store'])
        ->name('news.store');
});

Route::prefix('admin')->group(function () {
    Route::resource('admin_news', \App\Http\Controllers\Admin\NewsController::class);
    Route::resource('category', CategoryController::class);
});

Route::resource('order', OrderController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
