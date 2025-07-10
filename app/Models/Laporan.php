<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'tanggal', 'jam', 'total_produk', 'total_pendapatan'
    ];

    public function user()
    {
           return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

}
