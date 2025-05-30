<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan menu</title>
</head>
<body>
    
<h2>Form Pemesanan</h2>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form action="{{ route('pesanan.store') }}" method="POST">
    @csrf
    <label>Nama Menu:</label>
    <input type="text" name="nama_menu" required><br>

    <label>Kuantitas:</label>
    <input type="number" name="kuantitas" required><br>

    <button type="submit">Pesan</button>
</form>
</body>
</html>