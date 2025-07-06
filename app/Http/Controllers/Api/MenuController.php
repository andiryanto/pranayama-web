<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();

        return response()->json([
            'status' => true,
            'message' => 'Daftar menu berhasil diambil.',
            'data' => $menus
        ]);
    }

    public function recommended()
    {
        $recommendedMenus = Menu::where('is_recommended', true)->get();
        return response()->json([
            'status' => true,
            'message' => 'Daftar menu rekomendasi berhasil diambil.',
            'data' => $recommendedMenus
        ]);
    }

    // Method untuk tambah menu baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            // tambahkan validasi field lain jika perlu
        ]);

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->price = $request->price;
        // set field lain sesuai kebutuhan

        $menu->is_recommended = $request->is_recommended ? 1 : 0;

        $menu->save();

        return response()->json([
            'status' => true,
            'message' => 'Menu berhasil ditambahkan',
            'data' => $menu
        ]);
    }

    // Method untuk update menu
    public function update(Request $request, $id)
    {

        dd($request->all());
        $menu = Menu::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            // validasi lainnya jika perlu
        ]);

        $menu->name = $request->name;
        $menu->price = $request->price;
        // update field lain jika ada

        $menu->is_recommended = $request->has('is_recommended') ? 1 : 0;

        $menu->save();

        return response()->json([
            'status' => true,
            'message' => 'Menu berhasil diupdate',
            'data' => $menu
        ]);
    }
}
