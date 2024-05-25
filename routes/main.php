<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index')->name('home');
Route::get('language/{language}', LanguageController::class)->name('language');
Route::view('placeholders', 'placeholders.index')->name('placeholders');
Route::view('pluralization', 'pluralization.index')->name('pluralization');
