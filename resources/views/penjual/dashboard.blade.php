<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="d-flex" style="min-height: 100vh;">

        <nav class="bg-danger text-white p-3" style="width: 250px;">
            <h4 class="text-white mb-4">Admin Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('menus.index') }}">
                        <i class="bi bi-bar-chart-line-fill me-2"></i> Table Menu
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
                <h2 class="mb-0">Dashboard Penjual</h2>
                <span class="text-muted">Selamat datang, <strong>{{ session('user_role') }}</strong></span>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Selamat Datang di Tel-U Canteen Management System</h5>
                    <p class="card-text">Gunakan menu di sebelah kiri untuk mengelola stall dan produk Anda.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>