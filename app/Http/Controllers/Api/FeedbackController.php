<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    // ✅ Method GET: ambil semua feedback
    public function index()
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->get();

        return response()->json($feedbacks);
    }

    // ✅ Method POST: kirim feedback
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $feedback = Feedback::create([
            'message' => $validated['message'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback berhasil dikirim.',
            'data' => $feedback,
        ], 201);
    }
}
// File: app/Http/Controllers/Api/FeedbackController.php