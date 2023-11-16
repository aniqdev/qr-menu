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

Route::get('/qrsaas', [\App\Http\Controllers\HomeController::class, 'qrsaas']);
Route::get('/', [\App\Http\Controllers\HomeController::class, 'landing'])->name('home');
Route::get('/landing-page-list', [\App\Http\Controllers\HomeController::class, 'landingPageList']);

Route::get('/notification', function () {
 
    $user = \App\Models\User::find(1);
    return (new \App\Notifications\InvoicePaid)->toMail($user);
});

// Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::group([
    'middleware' => ['auth', \App\Http\Middleware\UserLastSeen::class],
    'prefix' => 'admin',
], function () {

    Route::get('dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('statistics', [\App\Http\Controllers\HomeController::class, 'statistics'])->name('admin.statistics');
    Route::get('dashboard-iframe-statistic', [\App\Http\Controllers\HomeController::class, 'dashboardIframeStatistic'])->name('dashboard-iframe-statistic');
    Route::post('run-command', [\App\Http\Controllers\HomeController::class, 'runCommand'])->name('run-command');

    Route::get('import-google-table', [\App\Http\Controllers\ImportController::class, 'importItemsFromGoogleTable'])->name('import-google-table');

    Route::get('menu', [\App\Http\Controllers\MenuController::class, 'adminMenu'])->name('admin.menu');

    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::post('categories/update-sorting', [\App\Http\Controllers\CategoryController::class, 'updateSorting'])->name('categories.update-sorting');
    Route::post('categories/{category}/update-visibility', [\App\Http\Controllers\CategoryController::class, 'updateVisibility'])->name('categories.update-visibility');

    Route::resource('items', \App\Http\Controllers\ItemController::class);
    Route::post('items/update-sorting', [\App\Http\Controllers\ItemController::class, 'updateSorting'])->name('items.update-sorting');
    Route::get('modals/items/create', [\App\Http\Controllers\ItemController::class, 'loadCreateModal'])->name('items.load-create-modal');
    Route::post('items/{item}/update-visibility', [\App\Http\Controllers\ItemController::class, 'updateVisibility'])->name('items.update-visibility');

    Route::get('templates', [\App\Http\Controllers\TemplateController::class, 'templates'])->name('admin.templates');

    Route::get('qr-code', [\App\Http\Controllers\QrCodeController::class, 'qrCodePage'])->name('admin.qr-code');

    Route::get('settings', [\App\Http\Controllers\CompanyController::class, 'edit'])->name('admin.settings');
    Route::put('company/update', [\App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
    Route::post('companies/{company}/set-template', [\App\Http\Controllers\CompanyController::class, 'setTemplate'])->name('companies.set-template');

    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/update-password', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::get('profile/change-lang/{lang}', [\App\Http\Controllers\ProfileController::class, 'changeLang'])->name('profile.change-lang')->whereIn('lang', ['uk', 'en', 'ru']);

    Route::get('json-form-test', [\App\Http\Controllers\MenuController::class, 'jsonFormTest'])->name('json-form-test');

    Route::get('menu/load-menu-modal', [\App\Http\Controllers\MenuController::class, 'loadMenuModal'])->name('menu-modal');

    Route::get('menu/template-settings-modal', [\App\Http\Controllers\MenuController::class, 'settingsModal']);
    Route::post('menu/template-settings-save', [\App\Http\Controllers\MenuController::class, 'saveTemplateSettings']);

    Route::get('cafe-qr-code-image', [\App\Http\Controllers\QrCodeController::class, 'cafeQrCodeImage'])->name('admin.cafe-qr-code-image');
    Route::get('menu-qr-code-image', [\App\Http\Controllers\QrCodeController::class, 'menuQrCodeImage'])->name('admin.menu-qr-code-image');

    Route::get('modals/{view}', [\App\Http\Controllers\ModalsController::class, 'modals'])->name('admin-modals');

    Route::get('feedbacks', [\App\Http\Controllers\FeedbackController::class, 'feedbacks'])->name('admin.feedbacks');
});

Route::get('/cafe/sail.bar', function () {
    return redirect('/cafe/sail-bar');
});

Route::group([
    'middleware' => \App\Http\Middleware\MenuAnalytics::class,
], function () {

    Route::get('restaurant/{company:slug}/feedback', [\App\Http\Controllers\FeedbackController::class, 'leaveFeedback'])->name('restaurant.feedback');
    Route::get('cafe/{company:slug}/feedback', [\App\Http\Controllers\FeedbackController::class, 'leaveFeedback'])->name('cafe.feedback');
    Route::get('bar/{company:slug}/feedback', [\App\Http\Controllers\FeedbackController::class, 'leaveFeedback'])->name('bar.feedback');
    Route::post('cafe/{company:slug}/feedback', [\App\Http\Controllers\FeedbackController::class, 'saveFeedback'])->name('cafe.save-feedback');

    Route::get('restaurant/{company:slug}/menu', [\App\Http\Controllers\CompanyController::class, 'menu'])->name('restaurant.menu');
    Route::get('cafe/{company:slug}/menu', [\App\Http\Controllers\CompanyController::class, 'menu'])->name('cafe.menu');
    Route::get('bar/{company:slug}/menu', [\App\Http\Controllers\CompanyController::class, 'menu'])->name('bar.menu');

    Route::get('restaurant/{company:slug}', [\App\Http\Controllers\CompanyController::class, 'linksPage'])->name('restaurant.links-page');
    Route::get('cafe/{company:slug}', [\App\Http\Controllers\CompanyController::class, 'linksPage'])->name('cafe.links-page');
    Route::get('bar/{company:slug}', [\App\Http\Controllers\CompanyController::class, 'linksPage'])->name('bar.links-page');

});