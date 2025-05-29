<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Stall;
use App\Models\Kantin;
use App\Models\User;
use Illuminate\Http\Request;

class StallController extends Controller
{
    public function index()
    {
        $stalls = Stall::with(['kantin', 'user'])->get();
        return view('admin.stalls.index', compact('stalls'));
    }

    public function create()
    {
        $kantins = Kantin::all();
        $users = User::where('role', 'penjual')->get();
        return view('admin.stalls.create', compact('kantins', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string',
            'kantin_id' => 'required|exists:kantins,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Stall::create($request->all());
        return redirect()->route('stalls.index')->with('success', 'Stall berhasil ditambahkan.');
    }

    public function edit(Stall $stall)
    {
        $kantins = Kantin::all();
        $users = User::where('role', 'penjual')->get();
        return view('admin.stalls.edit', compact('stall', 'kantins', 'users'));
    }

    public function update(Request $request, Stall $stall)
    {
        $request->validate([
            'nama_usaha' => 'required|string',
            'kantin_id' => 'required|exists:kantins,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $stall->update($request->all());
        return redirect()->route('stalls.index')->with('success', 'Stall berhasil diperbarui.');
    }

    public function destroy(Stall $stall)
    {
        $stall->delete();
        return redirect()->route('stalls.index')->with('success', 'Stall berhasil dihapus.');
    }
}