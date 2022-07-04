<?php

use App\Http\Controllers\Auth\DiscordController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TestController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');

    Route::get('/discord/redirect', [
        DiscordController::class,
        'redirect'
    ])->name('discord.redirect');

    Route::get('/discord/auth', [
        DiscordController::class,
        'authenticate'
    ]);
});
