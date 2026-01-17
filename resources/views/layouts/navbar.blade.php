<nav class="navbar navbar-expand-lg navbar-light shadow-sm"
     style="background: linear-gradient(90deg, #ffb6e6, #e6c3ff); border-bottom: 3px solid #d63384;">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark" href="/">Warung Online</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">

                @auth
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/produk">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/pesanan">Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/admin/keuangan">Keuangan</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/menu">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/pesanan-saya">Pesanan Saya</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="btn btn-danger ms-2">Logout</button>
                        </form>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>

<style>
@auth
.navbar .nav-link,
.navbar-brand {
    color: #5a189a !important;
    font-weight: 500;
}

.navbar .nav-link:hover {
    color: #ff1493 !important;
}
@endauth
</style>
