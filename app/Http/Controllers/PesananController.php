<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Keuangan;
use App\Models\Produk; // ✅ DITAMBAH (biar bisa cek & kurangi stok)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    // ADMIN: lihat semua pesanan
    public function index()
    {
        $pesanan = Pesanan::with('user', 'produk')->latest()->get();
        return view('admin.pesanan', compact('pesanan'));
    }

    // PELANGGAN: lihat pesanan sendiri
    public function pesananSaya()
    {
        $pesanan = Pesanan::with('produk')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pesanan-saya', compact('pesanan'));
    }

    // ✅ PELANGGAN: buat pesanan (SUDAH DIPERBAIKI + CEK STOK)
    public function store(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1'
        ]);

        // Ambil produk (tanpa mengubah route/alur)
        $produk = Produk::findOrFail($id);

        // ✅ CEK STOK DULU (BIAR TIDAK BISA LEBIH)
        if ($request->jumlah > $produk->stok) {
            return back()->with('error', 'Stok tidak cukup! Sisa stok: ' . $produk->stok);
        }

        // ✅ BUAT PESANAN (TIDAK DIUBAH)
        Pesanan::create([
            'user_id'   => Auth::id(),
            'produk_id' => $id,
            'jumlah'    => $request->jumlah,
            'status'    => 'menunggu'
        ]);

        // ✅ KURANGI STOK OTOMATIS (INTI PERBAIKAN)
        $produk->stok = $produk->stok - $request->jumlah;
        $produk->save();

        return back()->with('success', 'Pesanan berhasil dikirim');
    }

    // ✅ ADMIN: tandai pesanan siap & masuk ke keuangan
    public function tandaiSiap($id)
    {
        $pesanan = Pesanan::with('produk')->findOrFail($id);

        // ubah status jadi siap
        $pesanan->update(['status' => 'siap']);

        // hitung total
        $total = $pesanan->produk->harga * $pesanan->jumlah;

        // MASUKKAN KE KEUANGAN (TIDAK DIUBAH)
        Keuangan::create([
            'pesanan_id' => $pesanan->id,
            'jumlah'     => $total,
            'keterangan' => 'Pembayaran pesanan #' . $pesanan->id
        ]);

        return back()->with('success', 'Pesanan siap & masuk ke keuangan');
    }
}
