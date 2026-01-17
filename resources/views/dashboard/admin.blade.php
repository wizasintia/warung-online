@extends('layouts.bootstrap')

@section('content')
<style>
    .bg-admin {
        background-image: url('/images/bg-dashboard.jpg');
        background-size: cover;
        background-position: center;
        min-height: 85vh;
        border-radius: 20px;
        padding: 50px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .bg-admin::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,110,199,0.75), rgba(142,45,226,0.75));
    }

    .bg-admin > * {
        position: relative;
        z-index: 1;
    }

    .img-dashboard {
        max-width: 90%;
        height: auto;
    }
</style>

<div class="bg-admin">
    <div class="row align-items-center">

        <div class="col-md-6">
            <h2 class="fw-bold">Dashboard Admin</h2>
            <p class="fs-5">Halo, {{ Auth::user()->name }}</p>
            <p>Kelola produk, pesanan, dan keuangan melalui menu atas.</p>

            <div class="mt-4">
                <a href="/produk" class="btn btn-light btn-lg">
                    Kelola Produk
                </a>
            </div>
        </div>

        <div class="col-md-6 text-center">
            <img src="{{ asset('img/admin.png') }}" class="img-dashboard">
        </div>

    </div>
</div>
@endsection
