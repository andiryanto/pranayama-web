<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
{
    $abouts = About::orderBy('created_at', 'desc')->get();

    $data = $abouts->map(function ($crew) {
        return [
            'id'        => $crew->id,
            'name'      => $crew->name,
            'position'  => $crew->position,
            'gender'    => $crew->gender, // ✅ pastikan kolom ini ada
            'photo'     => $crew->photo ? asset('storage/' . $crew->photo) : null,
            'instagram' => $crew->instagram,
            'created_at'=> $crew->created_at,
        ];
    });

    return response()->json([
        'success' => true,
        'message' => 'Data crew berhasil diambil',
        'data'    => $data
    ]);
}}
