<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi.index');
    }
    
    public function show($id)
{
    $transaksi = Transaksi::with('items')->findOrFail($id);
    return view('transaksi.show', compact('transaksi'));
}

}
