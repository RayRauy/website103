<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
}) -> name('index');

Route::get('about', function(){
    return view('about');
}) -> name('about');

Route::get('contact-us', function(){
    return view('contact');
}) -> name('contacts');

Route::get('create-news', function(){
    return view('create_news', []);
}) -> name('create_news');

Route::get('test', function(){
    $formattedTime = date('Y-m-d', time());
    return view('test', ['time' => $formattedTime]);
}) -> name('test');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
