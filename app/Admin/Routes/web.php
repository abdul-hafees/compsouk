<?php

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

use App\Admin\Http\Controllers\OrderController;
use App\Admin\Http\Controllers\ProfileController;
use App\Admin\Http\Controllers\ScrapeController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.login');
})->name('root');

Route::namespace('App\Admin\Http\Controllers')->group(function () {
    Auth::routes();
});

Route::middleware(['auth', 'log.activity'])->group(function () {
    Route::get('edit-profile', [ProfileController::class, 'editProfile'])->name('profile.edit-profile');
    Route::post('edit-profile', [ProfileController::class, 'updateProfile'])->name('profile.update-profile');
    Route::get('change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::post('change-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    Route::post('orders/import-excel', [OrderController::class, 'importOrders'])->name('orders.import-excel');
    Route::resource('orders', OrderController::class);

    Route::get('scrape', [ScrapeController::class, 'scrape'])->name('scrape.index');
    Route::get('proxy', [ScrapeController::class, 'proxy'])->name('proxy');
});

