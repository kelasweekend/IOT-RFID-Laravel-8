<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('uid')->group(function () {
    Route::get('get', [App\Http\Controllers\Admin\UidController::class, 'getUID'])->name('getUID');
    Route::post('send', [App\Http\Controllers\Admin\UidController::class, 'sendUID'])->name('sendUID');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin');
    Route::get('debit', [App\Http\Controllers\Admin\DebitController::class, 'index'])->name('admin.debit');
});

