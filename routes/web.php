<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
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
    return view('welcome');
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


Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

Route::get('/categories/{name}', [CategoryController::class, 'show'])
    ->name('category.show')
    ->where('name', '[a-z]+');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
