<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'transactions';
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image',
    ];
}
