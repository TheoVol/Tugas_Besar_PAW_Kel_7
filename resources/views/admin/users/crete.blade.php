<h2>Tambah User</h2>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nama" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <select name="role">
        <option value="customer">Customer</option>
        <option value="penjual">Penjual</option>
    </select><br>
    <button type="submit">Simpan</button>
</form>
