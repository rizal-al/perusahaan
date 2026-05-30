<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direksi;

class OperasiController extends Controller
{
    // 🔐 CEK AKSES
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

        // ✅ Direktur Utama
        if ($sessionJabatan === 'direktur utama') {
            session([
                'akses_full' => true,
                'akses_operasi' => true // 🔥 tambahin ini doang
            ]);

            return redirect('/direktur-operasi/home');
        }

        // ❌ selain direktur operasi ditolak
        if ($sessionJabatan !== 'direktur operasi') {
            return back()->with('error', 'Akses hanya untuk Direktur Operasi');
        }

        // ✅ Direktur Operasi
        session(['akses_operasi' => true]);

        return redirect('/direktur-operasi/home');
    }

    return back()->with('error', 'Jabatan atau ID perusahaan tidak sesuai');
}

    // 📊 DASHBOARD
    public function index()
    {
        $user = Direksi::find(session('direksi_id'));
        return view('direktur.operasi.index', compact('user'));
    }
}