<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    protected $fillable = [
        'transaksi_id', 'nama_produk', 'qty', 'harga',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
