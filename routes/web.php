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

Route::get('/test', function ()
{
    dd($_REQUEST);
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'qrsaas']);

Route::get('/notification', function () {
 
    $user = \App\Models\User::find(1);
    return (new \App\Notifications\InvoicePaid)->toMail($user);
});

Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin',
], function () {

    Route::get('dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::post('run-command', [\App\Http\Controllers\HomeController::class, 'runCommand'])->name('run-command');

    Route::get('menu', [\App\Http\Controllers\MenuController::class, 'adminMenu'])->name('admin.menu');

    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::post('categories/update-sorting', [\App\Http\Controllers\CategoryController::class, 'updateSorting'])->name('categories.update-sorting');

    Route::resource('items', \App\Http\Controllers\ItemController::class);
    Route::post('items/update-sorting', [\App\Http\Controllers\ItemController::class, 'updateSorting'])->name('items.update-sorting');
    Route::get('modals/items/create', [\App\Http\Controllers\ItemController::class, 'loadCreateModal'])->name('items.load-create-modal');

    Route::get('templates', [\App\Http\Controllers\TemplateController::class, 'templates'])->name('admin.templates');

    Route::get('qr-code', [\App\Http\Controllers\QrCodeController::class, 'qrCodePage'])->name('admin.qr-code');

    Route::get('settings', [\App\Http\Controllers\CompanyController::class, 'edit'])->name('admin.settings');
    Route::put('company/update', [\App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
    Route::post('companies/{company}/set-template', [\App\Http\Controllers\CompanyController::class, 'setTemplate'])->name('companies.set-template');

    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/update-password', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::get('profile/change-lang/{lang}', [\App\Http\Controllers\ProfileController::class, 'changeLang'])->name('profile.change-lang')->whereIn('lang', ['uk', 'en', 'ru']);

    Route::get('json-form-test', [\App\Http\Controllers\MenuController::class, 'jsonFormTest'])->name('json-form-test');

    Route::get('menu/template-settings-modal', [\App\Http\Controllers\MenuController::class, 'settingsModal']);

    Route::post('menu/template-settings-save', [\App\Http\Controllers\MenuController::class, 'saveTemplateSettings']);

    Route::get('cafe-qr-code-image', [\App\Http\Controllers\QrCodeController::class, 'cafeQrCodeImage'])->name('admin.cafe-qr-code-image');
    Route::get('menu-qr-code-image', [\App\Http\Controllers\QrCodeController::class, 'menuQrCodeImage'])->name('admin.menu-qr-code-image');
});


Route::get('restaurant/{company_slug}/menu', [\App\Http\Controllers\CompanyController::class, 'menu'])->name('restaurant.menu');
Route::get('cafe/{company_slug}/menu', [\App\Http\Controllers\CompanyController::class, 'menu'])->name('cafe.menu');
Route::get('bar/{company_slug}/menu', [\App\Http\Controllers\CompanyController::class, 'menu'])->name('bar.menu');

Route::get('restaurant/{company_slug}', [\App\Http\Controllers\CompanyController::class, 'linksPage'])->name('restaurant.links-page');
Route::get('cafe/{company_slug}', [\App\Http\Controllers\CompanyController::class, 'linksPage'])->name('cafe.links-page');
Route::get('bar/{company_slug}', [\App\Http\Controllers\CompanyController::class, 'linksPage'])->name('bar.links-page');
