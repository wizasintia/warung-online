@extends('layouts.bootstrap')

@section('content')
<h4>Pesanan Saya</h4>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Harga</th>
    </tr>
<form action="/checkout" method="POST">
    @csrf
    <button class="btn btn-success mt-3">
        Checkout Pesanan
    </button>
</form>

    @foreach($keranjang as $item)
    <tr>
        <td>{{ $item['nama'] }}</td>
        <td>Rp {{ number_format($item['harga'],0,',','.') }}</td>
    </tr>
    @endforeach
</table>
@endsection
