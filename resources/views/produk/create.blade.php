@extends('layouts.bootstrap')

@section('content')
<div class="card">
    <div class="card-header">Tambah Produk</div>
    <div class="card-body">
        <form action="/produk/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="15000" required>
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Foto Produk</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection
