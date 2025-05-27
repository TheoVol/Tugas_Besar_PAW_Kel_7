<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Stall;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $menus = Menu::with('stall')->get();
        return view('menu.menu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stalls = Stall::all();
        return view('menu.create', compact('stalls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stall_id' => 'required|exists:stalls,id',
        ]);

        Menu::create($request->all());
        return redirect()->route('menus.menu')->with('success', 'Menu berhasil di buat !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $stalls = Stall::all();
        return view('menu.edit', compact('menu', 'stalls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stall_id' => 'required|exists:stalls,id',
        ]);

        $menu = Menu::findOrFail($id);

        $menu->update($request->all());
        return redirect()->route('menus.menu')->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menus.menu')->with('success', 'Menu deleted successfully.');
    }
}
