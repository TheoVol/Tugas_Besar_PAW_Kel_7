<!DOCTYPE html>
<html>
<head>
    <title>Daftar Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="d-flex" style="min-height: 100vh;">
    <!-- Sidebar -->
    <nav class="bg-danger text-white p-3" style="width: 250px;">
        <h4 class="text-white mb-4">Penjual Panel</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="/penjual/dashboard">
                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white active" href="{{ route('menus.index') }}">
                    <i class="bi bi-list-ul me-2"></i>Daftar Menu
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a class="btn btn-warning w-100" href="/logout">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Daftar Menu</h2>
            <a href="{{ route('menus.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle me-1"></i> Tambah Menu
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stall</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($menus as $menu)
                                <tr>
                                    <td>{{ $menu->nama }}</td>
                                    <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                                    <td>{{ $menu->stall->nama_usaha }}</td>
                                    <td>
                                        @if(session('user_role') === 'penjual' && $menu->stall->user_id == session('user_id'))
                                            <a href="{{ route('menus.edit', $menu) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button onclick="return confirm('Yakin ingin menghapus menu ini?')" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada menu.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
