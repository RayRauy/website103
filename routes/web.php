<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Http\Request;

Route::get('/', action: function () {
    return view('index');
}) -> name('index');
Auth::routes();

//Optionals: Save Theme on reload
Route::post('/theme-set', function(Request $request){
    $request->validate([
        'theme' => 'required|in:light,dark'
    ]);
    session(['theme' => $request->theme]);
    return response()->json(['theme' => session('theme')]);
})->name('theme-set');

// Route::get('login', [HomeController::class, 'login']) -> name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Roles
Route::get('role-index', [RoleController::class, 'index']) -> name('role.index');
Route::get('role-create', [RoleController::class, 'create']) -> name('role.create');
Route::post('role-store', [RoleController::class, 'store']) -> name('role.store');
Route::get('role-edit/{id}', [RoleController::class, 'edit']) -> name('role.edit');
Route::put('role-update/{id}', [RoleController::class, 'update']) -> name('role.update');
Route::get('role-destroy/{id}', [RoleController::class, 'destroy']) -> name('role.delete');

//Menus
Route::get('menu-index', [MenuController::class, 'index']) -> name('menu.index');
Route::get('menu-create', [MenuController::class, 'create']) -> name('menu.create');
Route::post('menu-store', [MenuController::class, 'store']) -> name('menu.store');
Route::get('menu-edit/{id}', [MenuController::class, 'edit']) -> name('menu.edit');
Route::put('menu-update/{id}', [MenuController::class, 'update']) -> name('menu.update');
Route::get('menu-destroy/{id}', [MenuController::class, 'destroy']) -> name('menu.delete');
// Route::resource('roles', 'RoleController');