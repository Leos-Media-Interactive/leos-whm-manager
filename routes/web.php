<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WHMController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/sites/index', [SiteController::class, 'index'])->name('sites.index');

    Route::get('/sites/fetch', [WHMController::class, 'WPToolkitTest'])->name('whm.fetch');

});


