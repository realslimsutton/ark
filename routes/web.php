<?php

use App\Http\Controllers\LandingController;
use App\Http\Livewire\Auth\Login;
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

Route::middleware('guest')->name('auth.')->group(function () {
    Route::get('/login', Login::class)->name('login');
});
