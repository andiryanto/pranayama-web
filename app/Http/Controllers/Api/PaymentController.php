<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Midtrans\Config;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Midtrans\Notification;
use Midtrans\Snap;
use App\Models\Transaction;

class PaymentController extends Controller
{

    protected $midtransService;

    public function __construct(MidtransService $midtransService) {
        $this->midtransService = $midtransService;
    }


    public function payment(Request $request)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');

        $orderId = uniqid('INV-');

        try {
            $validate = $request->validate([
                'transaction_id' => 'required',
            ]);

            $transaction = Transaction::find($request->transaction_id);

            /**
             * Detail customer bisa diubah kalau transaksi ada relasi ke user
             * 
             * Lihat dokumentasi di midtransnya, properti apa saja yang bisa di masukan,
             * dan jangan lupa buat akun midtrans lalu daftarkan di .env untuk server key dan client key (Pilih yang sandbox jangan production)
             */
            $params = [
                'transaction_details' => [
                    'order_id' => $transaction->no_transaction,
                    'gross_amount' => $transaction->total_price,
                ],
                'customer_details' => [
                    'first_name' => 'Ilham',
                    'email' => 'ilham@example.com',
                ],
            ];

            $snap = $this->midtransService->createTransaction($params);

            return response()->json([
                'message' => 'Payment process',
                'payment' => $snap->redirect_url
            ]);

        } catch (\Exception $ex) {
             return response()->json([
                'data' => 'Error',
                'error' => $ex->getMessage()
            ]);
        }
    }

    /**
     * Summary of handlerNotification
     * Fungsi untuk handler status si paymentnya || kalau mau langsung redirect url di Midtrans Website
     */
    public function handlerNotification()
    {
        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = config('midtrans.is_sanitized');
        Config::$is3ds        = config('midtrans.is_3ds');

        $notification = new Notification();

        $status = $notification->transaction_status;
        $orderId = $notification->order_id;

        $transaction = Transaction::where('no_transaction', $orderId)->first();

        if (! $transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transaction->update([
            'status' => $status,
        ]);

        return response()->json(['message' => 'Notification handled']);

    }
}