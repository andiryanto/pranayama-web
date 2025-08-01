<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'menu';
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image',
        'is_recommended'
    ];
}
