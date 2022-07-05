<?php

use App\Http\Controllers\Auth\DiscordController;
use App\Http\Controllers\LandingController;
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

Route::get('/test/{id}', [
    TestController::class,
    'show'
])->name('test');

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
