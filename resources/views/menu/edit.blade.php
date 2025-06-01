<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    @if(session('user_role') !== 'penjual')
        <div class="alert alert-danger">Anda tidak memiliki akses ke halaman ini.</div>
        @php exit; @endphp
    @endif

    <h2 class="mb-3">Edit Menu</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Menu</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $menu->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $menu->harga) }}" required>
        </div>

        <div class="mb-3">
            <label for="stall_id" class="form-label">Stall</label>
            <select name="stall_id" class="form-select" required>
                @foreach($stalls as $stall)
                    <option value="{{ $stall->id }}" {{ $menu->stall_id == $stall->id ? 'selected' : '' }}>
                        {{ $stall->nama_usaha }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('menus.index') }}" class="btn btn-secondary">Batal</a>
    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
