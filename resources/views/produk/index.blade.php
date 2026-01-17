@extends('layouts.bootstrap')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Data Produk</h5>
        <a href="/produk/create" class="btn btn-primary btn-sm">+ Tambah Produk</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($p->foto)
                            <img src="{{ asset('storage/'.$p->foto) }}" width="80">
                        @endif
                    </td>
                    <td>{{ $p->nama_produk }}</td>
                    <td>Rp {{ number_format($p->harga,0,',','.') }}</td>
                    <td>{{ $p->stok }}</td>
                    <td>
                        <a href="/produk/{{ $p->id }}/edit" class="btn btn-warning btn-sm mb-1">Edit</a>

                        <form action="/produk/{{ $p->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
