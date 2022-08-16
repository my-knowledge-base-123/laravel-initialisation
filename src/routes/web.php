<?php

use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\UserController;
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

Route::namespace('App\Http\Controllers\Web')
    ->group(function () {
        Route::get('/', [PageController::class, 'home'])->name('pages.home');
        Route::resource('users', UserController::class);
    });
