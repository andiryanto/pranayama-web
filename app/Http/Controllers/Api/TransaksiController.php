<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Transaksi;
use App\Services\MidtransService;

class TransaksiController extends Controller
{
    // Untuk tampilan halaman
    public function index()
    {
        return view('transaksi.index');
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('items')->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    // === ✅ API Checkout untuk Midtrans ===
    public function checkout(Request $request, MidtransService $midtrans)
{
    $orderId = 'ORDER-' . strtoupper(Str::random(10));

    $params = [
        'transaction_details' => [
            'order_id' => $orderId,
            'gross_amount' => $request->gross_amount,
        ],
        'customer_details' => [
            'first_name' => $request->name ?? 'Guest',
            'email' => $request->email ?? 'guest@example.com',
        ],
        'callbacks' => [
            'finish' => url('/payment/success'),
        ],
    ];

    try {
        $snap = $midtrans->createTransaction($params);

        // ⏬ SIMPAN TRANSAKSI
        $transaksi = Transaksi::create([
            'no_transaction' => $orderId,
            'total_price' => $request->gross_amount,
            'type_transaction' => $request->type_transaction ?? 'takeaway',
            'customer_id' => 1, // dummy sementara
            'staff_id' => 1,  // dummy sementara
            'no_antrian' => rand(1, 999),
        ]);

        // ⏬ SIMPAN ITEM
        foreach ($request->items as $item) {
            \App\Models\TransaksiItem::create([
                'transaksi_id' => $transaksi->id,
                'nama_produk' => $item['name'],
                'harga' => $item['price'],
                'qty' => $item['qty'],
                'subtotal' => $item['price'] * $item['qty'],
                'note' => $item['note'] ?? null,
            ]);
        }

        return response()->json([
            'snap_token' => $snap->token,
            'redirect_url' => $snap->redirect_url,
            'order_id' => $orderId,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}
}