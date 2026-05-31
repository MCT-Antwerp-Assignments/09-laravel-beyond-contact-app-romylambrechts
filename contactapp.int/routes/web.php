<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
    Route::get('add', [App\Http\Controllers\ContactController::class, 'add'])->name('add');
    Route::post('add', [App\Http\Controllers\ContactController::class, 'store'])->name('add.store');
});