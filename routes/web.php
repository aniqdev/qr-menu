<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->group(function ()
{
    Route::get('menu', [\App\Http\Controllers\MenuController::class, 'backMenu'])->name('back.menu');

    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::post('/categories/update-sorting', [\App\Http\Controllers\CategoryController::class, 'updateSorting'])->name('categories.update-sorting');

    Route::resource('items', \App\Http\Controllers\ItemController::class);
    Route::post('/items/update-sorting', [\App\Http\Controllers\ItemController::class, 'updateSorting'])->name('items.update-sorting');

    Route::get('templates', [\App\Http\Controllers\TemplateController::class, 'templates'])->name('templates');
});


Route::get('menu', [\App\Http\Controllers\MenuController::class, 'frontMenu'])->name('front.menu');
