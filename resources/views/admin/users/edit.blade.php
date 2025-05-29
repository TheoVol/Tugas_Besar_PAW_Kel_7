<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
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
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-grid-fill me-2"></i>Table Stall
                    </a>
                </li>
            </ul>
        </nav>

        <div class="flex-grow-1 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Edit User</h2>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password (opsional)</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak diubah">
                        </div>

                        <div class="mb-4">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select">
                                <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                                <option value="penjual" {{ $user->role == 'penjual' ? 'selected' : '' }}>Penjual</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Update
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