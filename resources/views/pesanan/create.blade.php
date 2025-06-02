<!DOCTYPE html>
<html>
<head>
    <title>Form Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        form {
            max-width: 400px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .success {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Form Pemesanan</h2>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/pesanan" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Menu:</label><br>
            <input type="text" name="nama_menu" value="{{ old('nama_menu') }}">
        </div>

        <div class="form-group">
            <label>Kuantitas:</label><br>
            <input type="number" name="kuantitas" value="{{ old('kuantitas') }}">
        </div>

        <button type="submit">Pesan</button>
    </form>
</body>
</html>
