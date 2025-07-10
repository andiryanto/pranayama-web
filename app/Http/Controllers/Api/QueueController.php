<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;

class QueueController extends Controller
{
    public function current()
    {
        $queueNumber = Transaksi::where('status', 'finish')->count();

        return response()->json([
            'queue_number' => $queueNumber
        ]);
    }
}
