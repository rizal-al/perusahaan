<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direksi extends Model
{
    protected $table = 'direksis';

    protected $fillable = [
        'nama',
        'email',
        'jabatan',
        'id_perusahaan',
        'password'
    ];

    public function index()
{
    $direksis = Direksi::all();
    return view('direktur.utama.pemegang-direksi.index', compact('direksis'));
}
}
