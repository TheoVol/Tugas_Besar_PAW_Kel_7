<!DOCTYPE html>
<html>
<head>
    <title>Tambah Stall</title>
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
                    <a class="nav-link text-white" href="{{ route('users.index') }}">
                        <i class="bi bi-people-fill me-2"></i>Table User
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="{{ route('kantins.index') }}">
                        <i class="bi bi-shop me-2"></i>Table Kantin
                    </a>
                </li>
                <li class="nav-item mb-4">
                    <a class="nav-link text-white active" href="{{ route('stalls.index') }}">
                        <i class="bi bi-grid-fill me-2"></i>Table Stall
                    </a>
                </li>
            </ul>
        </nav>

        <div class="flex-grow-1 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Tambah Stall</h2>
                <a href="{{ route('stalls.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('stalls.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_usaha" class="form-label">Nama Usaha</label>
                            <input type="text" name="nama_usaha" id="nama_usaha" class="form-control" placeholder="Masukkan nama usaha" required>
                        </div>

                        <div class="mb-3">
                            <label for="kantin_id" class="form-label">Pilih Kantin</label>
                            <select name="kantin_id" id="kantin_id" class="form-control" required>
                                <option value="">-- Pilih Kantin --</option>
                                @foreach($kantins as $kantin)
                                    <option value="{{ $kantin->id }}">{{ $kantin->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Pilih Penjual</label>
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option value="">-- Pilih Penjual --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->nama }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>