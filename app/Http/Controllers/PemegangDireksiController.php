<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Direksi;

class PemegangDireksiController extends Controller
{
    public function index()
    {
        $perusahaans = Perusahaan::all();
        $direksis = Direksi::all()->keyBy('id_perusahaan');

        return view('direktur.utama.pemegang-direksi.index', compact('perusahaans', 'direksis'));
    }
}