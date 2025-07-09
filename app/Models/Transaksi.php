<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $table = 'transaksis';
    protected $fillable = [
        'no_transaction', // required
        'type_transaction', // required
        'total_price', // required
        'customer_id', // required
        'staff_id', // required
        'no_antrian', // required
        'status',
    ];
    
    public function items()
{
    return $this->hasMany(TransaksiItem::class);
}

public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
