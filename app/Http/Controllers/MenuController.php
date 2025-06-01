<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Stall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class MenuController extends Controller
{
    public function __construct() {
        $this->middleware(function ($request, $next) {
            if (session('user_id') && session('user_role') === 'penjual') {
                return $next($request);
            }
            return redirect('/login');
        });
    }


    public function index()
    {
        $menus = Menu::whereHas('stall', function ($query) {
            $query->where('user_id',session('user_id'));
        })->with('stall')->get();

        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        $stalls = Stall::where('user_id', session('user_id'))->get();
        return view('menu.create', compact('stalls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stall_id' => 'required|exists:stalls,id',
        ]);

        $stall = Stall::where('id', $request->stall_id)
                      ->where('user_id', session('user_id'))
                      ->first();

        if (!$stall) {
            return redirect()->back()->with('error', 'Stall tidak valid.');
        }

        Menu::create($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dibuat.');
    }

    public function edit(Menu $menu)
    {
        if ($menu->stall->user_id !== session('user_id')) {
            abort(403, 'Anda tidak memiliki akses ke menu ini.');
        }

        $stalls = Stall::where('user_id', session('user_id'))->get();
        return view('menu.edit', compact('menu', 'stalls'));
    }

    public function update(Request $request, Menu $menu)
    {
        if ($menu->stall->user_id !== session('user_id')) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit menu ini.');
        }

        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stall_id' => 'required|exists:stalls,id',
        ]);

        $menu->update($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->stall->user_id !== session('user_id')) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus menu ini.');
        }

        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}
