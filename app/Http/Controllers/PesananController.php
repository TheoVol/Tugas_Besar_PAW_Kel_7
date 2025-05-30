<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Menu;
use App\Models\Pesanan;


class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pesanan.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_menu' => 'required|string',
            'kuantitas' => 'required|int'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $menu = Menu::where('nama_menu', $request->nama_menu)->first();

        if (!$menu){
            return back()->withErrors(['nama_menu' => 'Menu tidak tersedia.'])->withinput();
        }

        $pesanan = Pesanan::create([
            'nama_menu' => $request->nama_menu,
            'kuantitas' => $request->kuantitas,
        ]);

        return redirect()->back()->with('success', 'Pesanan berhasil');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
