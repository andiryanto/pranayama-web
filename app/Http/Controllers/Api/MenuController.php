<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    //
    public function index()
    {
        $menus = Menu::all();

        return response()->json([
            'status' => true,
            'message' => 'Daftar menu berhasil diambil.',
            'data' => $menus
        ]);
    }
}
