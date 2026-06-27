<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduksiController;

/*
|--------------------------------------------------------------------------
| Web Routes - Sistem Informasi Pengelolaan Data Produksi MBG
|--------------------------------------------------------------------------
*/

// ── AUTH ROUTES (Guest only) ──────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Logout (harus login)
Route::post('/logout', [AuthController::class, 'logout'])
     ->name('logout')
     ->middleware('auth');

// ── PROTECTED ROUTES (Harus Login) ───────────────────────────────────────
Route::middleware('auth')->group(function () {

    // Redirect halaman utama ke data produksi
    Route::get('/', function () {
        return redirect()->route('produksi.index');
    });

    // Resource route untuk CRUD produksi (tanpa show)
    Route::resource('produksi', ProduksiController::class)
         ->except(['show']);
});
