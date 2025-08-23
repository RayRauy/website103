<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
}) -> name('index');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('role-index', [RoleController::class, 'index']) -> name('role.index');
Route::get('role-create', [RoleController::class, 'create']) -> name('role.create');
Route::post('role-store', [RoleController::class, 'store']) -> name('role.store');
Route::get('role-edit', [RoleController::class, 'edit']) -> name('role.edit');
Route::put('role-update', [RoleController::class, 'update']) -> name('role.update');
Route::get('role-delete', [RoleController::class, 'destroy']) -> name('role.delete');


// Route::resource('roles', 'RoleController');