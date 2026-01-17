@extends('layouts.bootstrap')

@section('content')

<!-- BACKGROUND FOTO -->
<div class="w-100 rounded-4 mb-4"
     style="
        background-image: url('/images/bg-dashboard.jpg');
        background-size: cover;
        background-position: center;
        min-height: 300px;
     ">

    <!-- OVERLAY -->
    <div class="h-100 p-4 rounded-4"
         style="background-color: rgba(255,255,255,0.85);">

        <div class="row">
            <div class="col-md-6">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5>Total Produk</h5>
                        <h2>{{ $totalProduk }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5>Total Pesanan</h5>
                        <h2>{{ $totalPesanan }}</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
