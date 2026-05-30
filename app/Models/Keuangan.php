<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'keuangans';

    protected $fillable = [
        'id_perusahaan',
        'keterangan',
        'tipe',
        'jumlah',
        'tanggal'
    ];

    public $timestamps = true;

    // ================= RELASI =================
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }
}