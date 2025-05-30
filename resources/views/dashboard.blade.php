<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="d-flex" style="min-height: 100vh;">

        <nav class="bg-danger text-white p-3" style="width: 250px;">
            <h4 class="text-white mb-4">Mahasiswa Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('pesanan.create') }}">
                        <i class="bi bi-people-fill me-2"></i>Table pemesanan
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('kantins.index') }}">
                        <i class="bi bi-shop me-2"></i>Table Kantin
                    </a>
                </li>
                <li class="nav-item mb-4">
                    <a class="nav-link text-white" href="{{ route('stalls.index') }}">
                        <i class="bi bi-grid-fill me-2"></i>Table Stall
                    </a>
                </li>
                <li class="nav-item mt-auto">
                    <a class="btn btn-warning w-100" href="/logout">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </a>
                </li>
            </ul>
        </nav>

        <div class="flex-grow-1 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Dashboard mahasiswa</h2>
                <span class="text-muted">Selamat datang, <strong>{{ session('user_role') }}</strong></span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>