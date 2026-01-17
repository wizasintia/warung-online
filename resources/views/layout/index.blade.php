@extends('layout.app')

@section('content')
<h3>Data Produk</h3>

<a href="/produk/create" class="btn btn-primary mb-3">+ Tambah Produk</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produk as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->nama_produk }}</td>
            <td>Rp {{ number_format($p->harga) }}</td>
            <td>
                <a href="/produk/{{ $p->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                <form action="/produk/{{ $p->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
