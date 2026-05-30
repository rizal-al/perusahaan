<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direksi;

class SDMController extends Controller
{
    public function aksesDirektur()
{
    return view('direktur.sdm.akses');
}

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
           return redirect('/direktur-sdm/home');
        }

            if ($sessionJabatan !== 'direktur sdm') {
                return back()->with('error', 'Akses hanya untuk Direktur Sdm');
            }

            session(['akses_sdm' => true]);

            return redirect('/direktur-sdm/home');
        }

        return back()->with('error', 'Jabatan atau ID perusahaan tidak sesuai');
    }
    public function homeDirektur()
{
    return view('direktur.sdm.index');
}
public function index()
{
    return view('direktur.sdm.index');
}
}