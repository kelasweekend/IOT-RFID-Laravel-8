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
    
    // Debit Management System
    Route::get('debit', [App\Http\Controllers\Admin\DebitController::class, 'index'])->name('admin.debit');
    Route::post('debit', [App\Http\Controllers\Admin\DebitController::class, 'AddDebit'])->name('admin.debit.add');
    Route::get('debit/list', [App\Http\Controllers\Admin\DebitController::class, 'getData'])->name('admin.debit.list');
    Route::get('debit/list/{id}/edit', [App\Http\Controllers\Admin\DebitController::class, 'editData'])->name('admin.debit.edit');
    Route::post('debit/list/{id}/pin', [App\Http\Controllers\Admin\DebitController::class, 'pinData'])->name('admin.debit.pin');
    Route::post('debit/list/{id}/update', [App\Http\Controllers\Admin\DebitController::class, 'updateData'])->name('admin.debit.update');
    Route::delete('debit/list/{id}/hapus', [App\Http\Controllers\Admin\DebitController::class, 'deleteData'])->name('admin.debit.hapus');

    // User Management System
    Route::get('user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user');
    Route::get('user/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'editData'])->name('admin.user.edit');
    Route::post('user/{id}/password', [App\Http\Controllers\Admin\UserController::class, 'passwordData'])->name('admin.user.password');
    Route::post('user/{id}/update', [App\Http\Controllers\Admin\UserController::class, 'updateData'])->name('admin.user.update');
    Route::delete('user/{id}/hapus', [App\Http\Controllers\Admin\UserController::class, 'deleteData'])->name('admin.user.hapus');
});

