@extends('layouts.bootstrap')

@section('content')
<h3 class="mb-4">Menu Warung</h3>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
@foreach($produk as $p)
<div class="col-md-4">
    <div class="card mb-3 shadow-sm">

        <!-- GAMBAR MENU (BARU DITAMBAHKAN) -->
        @if($p->foto)
            <img src="{{ asset('storage/'.$p->foto) }}" 
                 class="card-img-top" 
                 style="height: 200px; object-fit: cover;">
        @else
            <img src="https://via.placeholder.com/400x200?text=Menu"
                 class="card-img-top">
        @endif

        <div class="card-body">
            <h5>{{ $p->nama_produk }}</h5>
            <p class="text-muted">Rp {{ number_format($p->harga) }}</p>

            <form action="/pesan/{{ $p->id }}" method="POST">
                @csrf
                <input type="number" name="jumlah" min="1" value="1"
                    class="form-control mb-2" required>

                <button class="btn btn-success w-100">
                    Pesan
                </button>
            </form>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection
