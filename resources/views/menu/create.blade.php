@extends('layouts.app')

@section('content')
<h1>Tambah Menu Baru</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('menus.store') }}" method="POST">
    @csrf

    <div>
        <label for="nama">Nama Menu:</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
    </div>

    <div>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" value="{{ old('harga') }}" required>
    </div>

    <div>
        <label for="stall_id">Stall:</label>
        <select name="stall_id" id="stall_id" required>
            <option value="">-- Pilih Stall --</option>
            @foreach($stalls as $stall)
                <option value="{{ $stall->id }}" {{ old('stall_id') == $stall->id ? 'selected' : '' }}>
                    {{ $stall->nama_usaha }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Simpan</button>
    <a href="{{ route('menus.index') }}">Batal</a>
</form>
@endsection
