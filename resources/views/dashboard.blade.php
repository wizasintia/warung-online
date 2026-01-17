@extends('layouts.bootstrap')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        Dashboard
    </div>
    <div class="card-body">
        <h5>Selamat datang, {{ Auth::user()->name }}</h5>
        <p>Anda berhasil login ke sistem Warung Online UMKM.</p>

        <a href="{{ route('produk.index') }}" class="btn btn-success">
            Kelola Produk
        </a>
    </div>
</div>
@endsection
