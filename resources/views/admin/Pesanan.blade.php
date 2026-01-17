@extends('layouts.bootstrap')

@section('content')

<h3>Pesanan Masuk</h3>

<table class="table table-bordered mt-3">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Produk</th>
            <th>Tindakan</th>
        </tr>
    </thead>
<tbody>
@foreach($pesanan as $p)
<tr>
    <td>{{ $p->id }}</td>
    <td>{{ $p->user->name }}</td>
    <td>{{ $p->produk->nama_produk }}</td>
    <td>{{ $p->jumlah }}</td>
    <td>Rp {{ number_format($p->produk->harga, 0, ',', '.') }}</td>
    <td>
        Rp {{ number_format($p->produk->harga * $p->jumlah, 0, ',', '.') }}
    </td>
    <td>
        @if($p->status === 'menunggu')
        <form action="/pesanan/{{ $p->id }}/siap" method="POST">
            @csrf
            <button class="btn btn-success btn-sm">Tandai Siap ✔</button>
        </form>
        @else
            <span class="text-success">Sudah masuk ke keuangan</span>
        @endif
    </td>
</tr>
@endforeach
</tbody>

</table>

@endsection
