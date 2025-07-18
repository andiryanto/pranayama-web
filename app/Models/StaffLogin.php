<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffLogin extends Model
{
    //
    protected $table = 'staff_logins';

    protected $fillable = [
        'staff_id',
        'last_login_at',
    ];

    protected $dates = [
        'last_login_at',
    ];

    // Relasi ke user (staff)
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
