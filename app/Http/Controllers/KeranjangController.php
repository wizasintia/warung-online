<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = session('keranjang', []);
        return view('keranjang.index', compact('keranjang'));
    }

    public function tambah(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $jumlah = (int) $request->jumlah;

        $keranjang = session('keranjang', []);

        if (isset($keranjang[$id])) {
            $keranjang[$id]['jumlah'] += $jumlah;
        } else {
            $keranjang[$id] = [
                'nama'   => $produk->nama_produk,
                'harga'  => $produk->harga,
                'jumlah' => $jumlah,
            ];
        }

        session(['keranjang' => $keranjang]);

        return back();
    }
}
