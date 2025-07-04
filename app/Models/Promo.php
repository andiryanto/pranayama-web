<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    //
    protected $table = 'promo';
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'expiried_date',
        'promo_image',
    ];
}
