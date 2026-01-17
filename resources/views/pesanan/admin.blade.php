@extends('layouts.bootstrap')

@section('content')
<h4>Pesanan Pelanggan</h4>

<table class="table table-bordered">
<tr>
    <th>Produk</th>
    <th>Jumlah</th>
    <th>Total</th>
</tr>

@php $grand = 0; @endphp

@foreach($pesanans as $p)
@php $grand += $p->total; @endphp
<tr>
    <td>{{ $p->produk->nama_produk }}</td>
    <td>{{ $p->jumlah }}</td>
    <td>Rp {{ number_format($p->total,0,',','.') }}</td>
</tr>
@endforeach

<tr class="table-dark">
    <th colspan="2">TOTAL KEUANGAN</th>
    <th>Rp {{ number_format($grand,0,',','.') }}</th>
</tr>
</table>
@endsection
