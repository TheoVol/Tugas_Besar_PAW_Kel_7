<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class MenuApiController extends Controller
{
    public function index()
    {
        return response()->json(Menu::with('stall')->get());
    }

    public function show($id)
    {
        $menu = Menu::with('stall')->findOrFail($id);
        return response()->json($menu);
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'penjual') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'stall_id' => 'required|exists:stalls,id',
        ]);

        // Hanya izinkan menambahkan menu ke stall milik sendiri
        $stall = Auth::user()->stalls()->find($validated['stall_id']);
        if (!$stall) {
            return response()->json(['message' => 'Stall tidak ditemukan atau bukan milik Anda.'], 403);
        }

        $menu = Menu::create($validated);
        return response()->json($menu, 201);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        if (Auth::user()->role !== 'penjual' || $menu->stall->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'nama' => 'string',
            'harga' => 'numeric',
            'stall_id' => 'exists:stalls,id',
        ]);

        $menu->update($validated);
        return response()->json($menu);
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        if (Auth::user()->role !== 'penjual' || $menu->stall->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $menu->delete();
        return response()->json(['message' => 'Menu deleted']);
    }
}
