<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Kantin;
use Illuminate\Http\Request;

class KantinController extends Controller
{
    public function index()
    {
        $kantins = Kantin::all();
        return view('admin.kantins.index', compact('kantins'));
    }

    public function create()
    {
        return view('admin.kantins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'lokasi' => 'required|string',
        ]);

        Kantin::create($request->all());
        return redirect()->route('kantins.index')->with('success', 'Kantin berhasil ditambahkan.');
    }

    public function edit(Kantin $kantin)
    {
        return view('admin.kantins.edit', compact('kantin'));
    }

    public function update(Request $request, Kantin $kantin)
    {
        $request->validate([
            'nama' => 'required|string',
            'lokasi' => 'required|string',
        ]);

        $kantin->update($request->all());
        return redirect()->route('kantins.index')->with('success', 'Kantin berhasil diperbarui.');
    }

    public function destroy(Kantin $kantin)
    {
        $kantin->delete();
        return redirect()->route('kantins.index')->with('success', 'Kantin berhasil dihapus.');
    }
}
