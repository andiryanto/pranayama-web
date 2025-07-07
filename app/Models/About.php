<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    // Jika nama tabel adalah 'about', deklarasikan secara eksplisit
    protected $table = 'abouts';

    // Kolom yang boleh diisi melalui mass assignment
    protected $fillable = [
        'name',
        'position',
        'photo',
        'instagram',
    ];
}
