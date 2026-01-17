@extends('layouts.bootstrap')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <h5>Total Pemasukan</h5>
                <h2 class="text-success">
                    Rp {{ number_format($totalPemasukan,0,',','.') }}
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <h5>Total Pesanan</h5>
                <h2>{{ $totalPesanan }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection
