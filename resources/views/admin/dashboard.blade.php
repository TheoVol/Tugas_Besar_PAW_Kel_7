<h2>Dashboard Admin</h2>
<p>Selamat datang, {{ session('user_role') }}</p>

<ul>
    <li><a href="{{ route('users.index') }}">Kelola Mahasiswa & Penjual</a></li>
    {{-- Nanti bisa tambah link ke kelola kantin, stall, dll --}}
</ul>

<a href="/logout">Logout</a>