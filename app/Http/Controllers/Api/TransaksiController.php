<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use App\Services\MidtransService;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    // Halaman web (jika ada)
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


         if (!auth()->check()) {
        return response()->json([
            'status' => false,
            'message' => 'Unauthenticated: Token tidak valid atau tidak dikirim',
        ], 401);
    }
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


            // dd($request->items);

           
            
            $today = Carbon::today();

            $lastQueueToday = Transaksi::whereDate('tanggal', $today)->max('no_antrian') ?? 0;

            
            // Simpan transaksi
            $transaksi = Transaksi::create([
                'no_transaction'     => $orderId,
                'total_price'        => $request->gross_amount,
                'type_transaction'   => $request->type_transaction ?? 'takeaway',
                'customer_id'        => auth()->id(),
                'staff_id'           => $request->staff_id ?? 12,
                'no_antrian'         => $lastQueueToday + 1,
                'tanggal'            => $today,
            ]);

            // Simpan item transaksi
            foreach ($request->items as $item) {
                TransaksiItem::create([
                    'transaksi_id' => $transaksi->id,
                    'nama_produk'  => $item['name'],
                    'harga'        => $item['price'],
                    'qty'          => $item['qty'],
                    'subtotal'     => $item['price'] * $item['qty'],
                    'note'         => $item['note'] ?? null,
                    'extras'       => json_encode($item['extras'] ?? []),
                ]);
            }

            return response()->json([
                'snap_token'   => $snap->token,
                'redirect_url' => $snap->redirect_url,
                'order_id'     => $orderId,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // === ✅ API History Transaksi ===
    public function history($customer_id)
    {
        $transaksi = Transaksi::with(['items','staff'])
            ->where('customer_id', $customer_id)
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'status' => true,
            'data' => $transaksi,
        ]);
    }
}
