<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Stall;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('stall')->get();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'penjual') {
            abort(403, 'Akses ditolak');
        }

        $stalls = Stall::where('user_id', Auth::id())->get();
        return view('menu.create', compact('stalls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stall_id' => 'required|exists:stalls,id',
        ]);

        Menu::create($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        $stalls = Stall::all();
        return view('menu.edit', compact('menu', 'stalls'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stall_id' => 'required|exists:stalls,id',
        ]);

        $menu->update($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }
}
