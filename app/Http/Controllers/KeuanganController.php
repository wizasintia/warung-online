<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;

class KeuanganController extends Controller
{
    public function index()
    {
        // total pemasukan (DIPERBAIKI: hanya yang status = 'siap')
        $totalPemasukan = Pesanan::with('produk')
            ->where('status', 'siap')
            ->get()
            ->sum(function ($p) {
                return ($p->jumlah ?? 0) * ($p->produk->harga ?? 0);
            });

        // total pesanan (TIDAK DIUBAH)
        $totalPesanan = Pesanan::count();

        return view('admin.keuangan', compact(
            'totalPemasukan',
            'totalPesanan'
        ));
    }
}
