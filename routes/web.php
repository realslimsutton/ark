<?php

use App\Http\Controllers\Auth\DiscordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TestController;
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

Route::get('/', [
    LandingController::class,
    'index'
])->name('landing');

Route::prefix('/news')->name('news.')->group(function () {
    Route::get('/', [
        NewsController::class,
        'index'
    ])->name('index');
    Route::get('/{slug}', [
        NewsController::class,
        'show'
    ])->name('show');
});

Route::middleware([
    'auth',
    'verified'
])
    ->prefix('/store')
    ->name('store.')->group(function () {
        Route::get('/', [
            StoreController::class,
            'index'
        ])->name('index');

        Route::get('/product/{slug}', [
            StoreController::class,
            'show'
        ])->name('show');

        Route::get('/cart', [
            CartController::class,
            'show'
        ])->name('cart.show');

        Route::post('/cart/checkout', [
            CartController::class,
            'checkout'
        ])->name('cart.checkout');

        Route::get('/cart/success', [
            CartController::class,
            'success'
        ])->name('cart.checkout.success');
    });

Route::middleware([
    'auth',
    'verified'
])
    ->prefix('/donate')
    ->name('donate.')
    ->group(function () {
        Route::get('/', [
            DonationController::class,
            'index'
        ])->name('index');

        Route::get('/product/{id}', [
            DonationController::class,
            'checkout'
        ])->name('checkout');

        Route::get('/checkout/success', [
            DonationController::class,
            'success'
        ])->name('checkout.success');
    });

Route::middleware('guest')->group(function () {
    Route::get('/discord/redirect', [
        DiscordController::class,
        'redirect'
    ])->name('discord.redirect');

    Route::get('/discord/auth', [
        DiscordController::class,
        'authenticate'
    ]);
});
