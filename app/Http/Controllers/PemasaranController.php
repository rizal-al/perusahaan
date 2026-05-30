<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemasaranController extends Controller
{
  public function cekAkses(Request $request)
{
    if (!session()->has('direksi_id')) {
        return redirect('/')->with('error', 'Silakan login terlebih dahulu');
    }

    $sessionJabatan = strtolower(trim(session('jabatan')));
    $sessionId      = trim(session('id_perusahaan'));

    $inputJabatan = strtolower(trim($request->jabatan));
    $inputId      = trim($request->id_perusahaan);

    if ($inputJabatan === $sessionJabatan && $inputId === $sessionId) {

     if ($sessionJabatan === 'direktur utama') {
    session([
        'akses_full' => true,
        'akses_pemasaran' => true
    ]);

    return redirect('/direktur-pemasaran/home');
}

        if ($sessionJabatan !== 'direktur pemasaran') {
            return back()->with('error', 'Akses hanya untuk Direktur Pemasaran');
        }

        session(['akses_pemasaran' => true]);

        return redirect('/direktur-pemasaran/home');
    }

    return back()->with('error', 'Jabatan atau ID perusahaan tidak sesuai');
}

public function index()
{
    // 🔒 Proteksi akses
    if (!session('akses_pemasaran')) {
        return redirect('/direktur-pemasaran');
    }

    // 👤 Data user dari session
    $user = (object)[
        'jabatan' => session('jabatan')
    ];

    return view('direktur.pemasaran.index', compact('user'));
}
}
