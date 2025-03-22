<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CrudController;

Route::get('/', [CrudController::class, 'index']);
Route::post('/create', [CrudController::class, 'create'])->middleware('auth');
Route::get('/edit/{product}', [CrudController::class, 'edit'])->middleware('auth');
Route::put('/update/{product}', [CrudController::class, 'update'])->middleware('auth');
Route::get('/delete/{product}', [CrudController::class, 'destroy'])->middleware('auth');

// Página de login (GET)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Processar login (POST)
Route::post('/login', [LoginController::class, 'authenticate']);

// Página de registro (GET)
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Processar registro (POST)
Route::post('/register', [RegisterController::class, 'store']);

// Logout (POST)
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Dashboard (proteção com auth)
Route::get('/dashboard', [CrudController::class, 'dashboard'])->middleware('auth');