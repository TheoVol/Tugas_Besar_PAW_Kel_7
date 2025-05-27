<h1>Daftar Menu</h1>
<a href="{{ route('menus.create') }}">Tambah Menu</a>

<ul>
@foreach ($menus as $menu)
    <li>{{ $menu->nama }} - Rp{{ $menu->harga }} | {{ $menu->stall->nama_usaha }}
        <a href="{{ route('menus.edit', $menu->id) }}">Edit</a>
        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </li>
@endforeach
</ul>
