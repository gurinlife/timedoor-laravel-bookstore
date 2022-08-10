<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\Home@index')->name('home');
Route::get('/author', 'App\Http\Controllers\Author@index')->name('author');
Route::get('/rating', 'App\Http\Controllers\Rating@index')->name('rating');
