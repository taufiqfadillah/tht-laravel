<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ExportProdukController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/index');
    }
    return view('auth');
});

Route::post('/register', [UserController::class, 'store'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::middleware(['AuthUser', 'AuthJWT'])->group(function () {

    Route::get('/index', function (Request $request) {
        $sort = $request->input('sort', 'all');

        if ($sort === 'all') {
            $produk = \App\Models\Produk::all();
        } else {
            $produk = \App\Models\Produk::orderBy($sort)->get();
        }

        return view('dashboard.index', compact('produk', 'sort'));
    })->name('index');



    Route::get('/add-product', function () {
        return view('dashboard.add-product');
    })->name('add-product');

    Route::post('/post-product', [ProdukController::class, 'store'])->name('post-product');

    Route::get('/user', function () {
        $user = Auth::user();
        return view('dashboard.user', compact('user'));
    })->name('user');

    Route::post('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');

    Route::get('/export-product', [ExportProdukController::class, 'export'])->name('export-product');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
