<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // =========================
    // HALAMAN ADMIN - DAFTAR PRODUK
    // =========================
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    // =========================
    // FORM TAMBAH PRODUK (ADMIN)
    // =========================
    public function create()
    {
        return view('produk.create');
    }

    // =========================
    // SIMPAN PRODUK (ADMIN)
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        Produk::create($data);

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    // =========================
    // FORM EDIT PRODUK (ADMIN)
    // =========================
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    // =========================
    // UPDATE PRODUK (ADMIN)
    // =========================
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];

        if ($request->hasFile('foto')) {
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect('/produk')->with('success', 'Produk berhasil diperbarui');
    }

    // =========================
    // HAPUS PRODUK (ADMIN)
    // =========================
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect('/produk')->with('success', 'Produk berhasil dihapus');
    }

    // =========================
    // MENU PELANGGAN
    // =========================
    public function menu()
    {
        $produk = Produk::all();
        return view('menu', compact('produk'));
    }

    // =========================
    // PESAN LANGSUNG (STOK BERKURANG OTOMATIS)
    // =========================
   public function pesan(Request $request, $id)
{
    $request->validate([
        'jumlah' => 'required|integer|min:1'
    ]);

    $produk = Produk::findOrFail($id);

    // ❌ CEK STOK DULU
    if ($request->jumlah > $produk->stok) {
        return back()->with('error', 'Stok tidak mencukupi!');
    }

    // ✅ BUAT PESANAN
    Pesanan::create([
        'user_id'   => auth()->id(),
        'produk_id' => $id,
        'jumlah'    => $request->jumlah,
        'status'    => 'menunggu'
    ]);

    // ✅ KURANGI STOK OTOMATIS
    $produk->stok = $produk->stok - $request->jumlah;
    $produk->save();

    return back()->with('success', 'Pesanan berhasil dikirim, stok diperbarui');
}

}
