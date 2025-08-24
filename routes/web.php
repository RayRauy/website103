<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', action: function () {
    return view('index');
}) -> name('index');
Auth::routes();

// Route::get('login', [HomeController::class, 'login']) -> name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('role-index', [RoleController::class, 'index']) -> name('role.index');
Route::get('role-create', [RoleController::class, 'create']) -> name('role.create');
Route::post('role-store', [RoleController::class, 'store']) -> name('role.store');
Route::get('role-edit/{id}', [RoleController::class, 'edit']) -> name('role.edit');
Route::put('role-update/{id}', [RoleController::class, 'update']) -> name('role.update');
Route::get('role-destroy/{id}', [RoleController::class, 'destroy']) -> name('role.delete');


// Route::resource('roles', 'RoleController');