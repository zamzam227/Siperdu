<?php

use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ========================================
// POV USER / HALAMAN PUBLIK
// ========================================

Route::get('/', [HomeController::class, 'beranda'])
    ->name('user.beranda');

Route::get('/katalog-buku', [HomeController::class, 'katalogBuku'])
    ->name('user.katalog-buku');


// ========================================
// PENGARAH SETELAH LOGIN
// ========================================

Route::get('/dashboard', function () {

    $user = auth()->user();

    if ($user->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.beranda');

})->middleware('auth')->name('dashboard');


// ========================================
// PROFILE USER
// ========================================

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


// ========================================
// POV ADMIN
// Wajib LOGIN dan ROLE ADMIN
// ========================================

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Manajemen Buku
        Route::resource('buku', BukuController::class);

    });


// ========================================
// AUTHENTICATION BREEZE
// ========================================

require __DIR__.'/auth.php';
