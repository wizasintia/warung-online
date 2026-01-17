@extends('layouts.bootstrap')

@section('content')
<style>
    .bg-user {
        background-image: url('/images/bg-dashboard.jpg');
        background-size: cover;
        background-position: center;
        min-height: 85vh;
        border-radius: 15px;
        padding: 40px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .bg-user::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,110,199,0.75), rgba(142,45,226,0.75));
    }

    .bg-user > * {
        position: relative;
        z-index: 1;
    }

    .img-dashboard {
        max-width: 100%;
        height: auto;
    }
</style>

<div class="bg-user">
    <div class="row align-items-center">

        <div class="col-md-6">
            <h2 class="fw-bold">Warung Online</h2>
            <p class="fs-5">Selamat datang, {{ Auth::user()->name }}</p>
            <p>Pesan makanan favoritmu dengan cepat dan mudah.</p>

            <div class="mt-4">
                <a href="/menu" class="btn btn-light btn-lg">
                    Lihat Menu
                </a>
            </div>
        </div>

        <div class="col-md-6 text-center">
            <img src="{{ asset('img/pelanggan.png') }}" class="img-dashboard">
        </div>

    </div>
</div>
@endsection
