@extends('layouts.bootstrap')

@section('content')
<h3 class="mb-4">Pesanan Saya</h3>

@if($pesanan->isEmpty())
<div class="alert alert-secondary">
    Kamu belum memiliki pesanan.
</div>
@else

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pesanan as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->produk->nama_produk }}</td>
            <td>{{ $p->jumlah }}</td>
            <td>
                <span class="badge bg-info">
                    {{ ucfirst($p->status) }}
                </span>
            </td>
            <td>{{ $p->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endif
@endsection
