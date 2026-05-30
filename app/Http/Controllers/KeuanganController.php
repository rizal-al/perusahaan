<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direksi;

class KeuanganController extends Controller
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
            session(['akses_full' => true]);

            // arahkan ke halaman sesuai route yang sedang diakses
           return redirect('/direktur-keuangan/home');
        }

            if ($sessionJabatan !== 'direktur keuangan') {
                return back()->with('error', 'Akses hanya untuk Direktur Keuangan');
            }

            session(['akses_keuangan' => true]);

            return redirect('/direktur-keuangan/home');
        }

        return back()->with('error', 'Jabatan atau ID perusahaan tidak sesuai');
    }

    public function index()
    {
        $user = Direksi::find(session('direksi_id'));
        return view('direktur.keuangan.index', compact('user'));
    }
}