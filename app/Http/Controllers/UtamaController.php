<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direksi;

class UtamaController extends Controller
{
    // 🔐 CEK AKSES
    public function cekAkses(Request $request)
    {
        // wajib login dulu
        if (!session()->has('direksi_id')) {
            return redirect('/')->with('error', 'Silakan login terlebih dahulu');
        }

        // ambil session (sudah dibersihkan)
        $sessionJabatan = strtolower(trim((string) session('jabatan')));
        $sessionId      = trim((string) session('id_perusahaan'));

        // ambil input
        $inputJabatan = strtolower(trim($request->jabatan));
        $inputId      = trim($request->id_perusahaan);

        // validasi session kosong
        if ($inputJabatan === $sessionJabatan && $inputId === $sessionId) {

    if ($sessionJabatan !== 'direktur utama') {
        return back()->with('error', 'Akses hanya untuk Direktur Utama');
    }

    // 🔥 INI SOLUSI UTAMANYA
    session(['akses_direktur' => true]);

    return redirect('/direktur-utama/home');
}
        return back()->with('error', 'Jabatan atau ID perusahaan tidak sesuai');
    }

    // 📊 DASHBOARD
    public function index()
    {
        $totalDireksi = Direksi::count();
        return view('direktur.utama.index', compact('totalDireksi'));
    }
}