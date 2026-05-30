<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operasi extends Model
{
    protected $table = 'operasis';

    protected $fillable = [
        'id_perusahaan',
        'kegiatan',
        'status',
        'tanggal'
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }
}