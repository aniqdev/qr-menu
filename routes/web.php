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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'qrsaas']);

Route::get('/notification', function () {
 
    $user = \App\Models\User::find(1);
    return (new \App\Notifications\InvoicePaid)->toMail($user);
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin',
], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('menu', [\App\Http\Controllers\MenuController::class, 'adminMenu'])->name('admin.menu');

    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::post('/categories/update-sorting', [\App\Http\Controllers\CategoryController::class, 'updateSorting'])->name('categories.update-sorting');

    Route::resource('items', \App\Http\Controllers\ItemController::class);
    Route::post('/items/update-sorting', [\App\Http\Controllers\ItemController::class, 'updateSorting'])->name('items.update-sorting');

    Route::get('templates', [\App\Http\Controllers\TemplateController::class, 'templates'])->name('templates');

    Route::get('settings', [\App\Http\Controllers\CompanyController::class, 'settings'])->name('settings');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('json-form-test', [\App\Http\Controllers\MenuController::class, 'jsonFormTest'])->name('json-form-test');

    Route::get('/menu/template-settings-modal', [\App\Http\Controllers\MenuController::class, 'settingsModal']);

    Route::post('menu/template-settings-save', [\App\Http\Controllers\MenuController::class, 'saveTemplateSettings']);
});


Route::get('menu', [\App\Http\Controllers\MenuController::class, 'frontMenu'])->name('front.menu');
