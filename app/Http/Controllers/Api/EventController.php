<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return response()->json([
            'status' => true,
             'message' => 'Daftar event berhasil diambil.',
            'data' => $events
        ]);
    }
}
 