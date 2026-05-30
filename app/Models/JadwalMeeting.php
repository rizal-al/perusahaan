<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalMeeting extends Model
{
    protected $fillable = [

        'judul',
        'tanggal',
        'jam',
        'lokasi',
        'peserta',
        'agenda',

    ];
}