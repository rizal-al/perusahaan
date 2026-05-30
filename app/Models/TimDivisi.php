<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimDivisi extends Model
{
    protected $table = 'tim_divisi';

    protected $fillable = [
        'nama',
        'email',
        'tim_divisi',
        'password'
    ];
}
