<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/index');
    }
    return view('auth');
});

Route::post('/register', [UserController::class, 'store'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::middleware(['AuthUser', 'AuthJWT'])->group(function () {
    Route::get('/index', function () {
        return view('dashboard.index');
    })->name('index');

    Route::get('/user', function () {
        $user = Auth::user();
        return view('dashboard.user', compact('user'));
    })->name('user');

    Route::post('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
