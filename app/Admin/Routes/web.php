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
use App\Http\Controllers\HomeController;
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
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('edit-profile', [ProfileController::class, 'editProfile'])->name('profile.edit-profile');
    Route::post('edit-profile', [ProfileController::class, 'updateProfile'])->name('profile.update-profile');
    Route::get('change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::post('change-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::post('orders/import-excel', [OrderController::class, 'importOrders'])->name('orders.import-excel');
    Route::resource('orders', OrderController::class);
    Route::get('scrape', [OrderController::class, 'scrape'])->name('scrape.index');

    Route::get('/proxy', function () {
        $client = new Client();
        $url = 'https://www.amazon.com/s?k=graphics+card&crid=3GW7DYRQKYZP2&sprefix=gra%2Caps%2C261&ref=nb_sb_ss_ts-doa-p_1_3';
    
        try {
            $response = $client->request('GET', $url, [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3'
                ]
            ]);
            return response($response->getBody(), 200)
                ->header('Content-Type', 'text/html');
        } catch (\Exception $e) {
            return response('Error: Unable to fetch data.', 503);
        }
    })->name('proxy');

});

