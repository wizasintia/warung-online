<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KeuanganController;

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD BERDASARKAN ROLE
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return view('dashboard.admin');
    }

    return view('dashboard.pelanggan');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| ROUTE KHUSUS ADMIN (KELOLA PRODUK + PESANAN + KEUANGAN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/produk', function () {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'AKSES DITOLAK');
        }
        return app(ProdukController::class)->index();
    })->name('produk.index');

    Route::get('/produk/create', function () {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        return app(ProdukController::class)->create();
    });

    Route::post('/produk/store', function () {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        return app(ProdukController::class)->store(request());
    });

    Route::get('/produk/{id}/edit', function ($id) {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        return app(ProdukController::class)->edit($id);
    });

    Route::put('/produk/{id}', function ($id) {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        return app(ProdukController::class)->update(request(), $id);
    });

    Route::delete('/produk/{id}', function ($id) {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        return app(ProdukController::class)->destroy($id);
    });

    // 🔹 ADMIN: lihat semua pesanan
    Route::get('/pesanan', [PesananController::class, 'index'])->name('admin.pesanan');

    // ✅ **DITAMBAH (TANPA MERUBAH ROUTE LAMA)**
    // 🔹 ADMIN: tandai pesanan siap
    Route::post('/pesanan/{id}/siap', [PesananController::class, 'tandaiSiap']);

    // 🔹 ADMIN: keuangan
    Route::get('/admin/keuangan', [KeuanganController::class, 'index'])
        ->name('admin.keuangan');
});

/*
|--------------------------------------------------------------------------
| ROUTE PELANGGAN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/menu', [ProdukController::class, 'menu']);

    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah']);

    // 🔹 PELANGGAN: lihat pesanan sendiri
    Route::get('/pesanan-saya', [PesananController::class, 'pesananSaya']);

    // 🔹 PELANGGAN: kirim pesanan
    Route::post('/pesan/{id}', [PesananController::class, 'store']);
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
