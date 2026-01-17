<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Online</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f3e8ff !important;
        }

        .panel-ungu {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(8px);
            border-radius: 15px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
        }

        /* WARNA NAVBAR BARU (AMAN & TIDAK MERUSAK) */
        .navbar-custom {
            background: linear-gradient(135deg, #f8e6ff, #e6d4ff) !important;
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: #5a189a !important;
            font-weight: 500;
        }

        .navbar-custom .nav-link:hover {
            color: #ff1493 !important;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light shadow-sm navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="/">Warung Online</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                @auth
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="/produk">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pesanan">Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/keuangan">Keuangan</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/menu">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pesanan-saya">Pesanan Saya</a>
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

<div class="container mt-4 p-4 panel-ungu">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
