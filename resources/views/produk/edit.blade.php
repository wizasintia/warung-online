@extends('layouts.bootstrap')

@section('content')
<div class="card">
    <div class="card-header">Edit Produk</div>
    <div class="card-body">
        <form action="/produk/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control"
                    value="{{ $produk->nama_produk }}" required>
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control"
                    value="{{ $produk->harga }}" required>
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control"
                    value="{{ $produk->stok }}" required min="0">
            </div>

            <div class="mb-3">
                <label>Foto Produk</label>
                <input type="file" name="foto" class="form-control">

                @if($produk->foto)
                    <div class="mt-2">
                        <img src="{{ asset('storage/'.$produk->foto) }}" width="120">
                    </div>
                @endif
            </div>

            <button class="btn btn-success">Update</button>
            <a href="/produk" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
