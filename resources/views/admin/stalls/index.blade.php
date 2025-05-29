<!DOCTYPE html>
<html>
<head>
    <title>Daftar Stall</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="d-flex" style="min-height: 100vh;">
        <nav class="bg-danger text-white p-3" style="width: 250px;">
            <h4 class="text-white mb-4">Admin Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="/admin/dashboard">
                        <i class="bi bi-speedometer2 me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white active" href="{{ route('users.index') }}">
                        <i class="bi bi-people-fill me-2"></i>Table User
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
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Daftar Stall</h2>
                <a href="{{ route('stalls.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Stall
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>Nama Usaha</th>
                                    <th>Kantin</th>
                                    <th>Penjual</th>
                                    <th style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($stalls as $s)
                                <tr>
                                    <td>{{ $s->nama_usaha }}</td>
                                    <td>{{ $s->kantin->nama }}</td>
                                    <td>{{ $s->user->name }}</td>
                                    <td>
                                        <a href="{{ route('stalls.edit', $s->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('stalls.destroy', $s->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Stall ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($stalls->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Tidak ada data stall.</td>
                                </tr>
                            @endif
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