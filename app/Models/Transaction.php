<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transactions';
    protected $fillable = [
        'no_transaction', // required
        'type_transaction', // required
        'total_price', // required
        'customer_id', // required
        'staff_id', // required
        'category',
        'no_antrian', // required
        'status',
    ];
}