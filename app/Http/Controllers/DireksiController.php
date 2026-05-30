<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Direksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DireksiController extends Controller
{
    // ==================== REGISTER ====================
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:direksis,email',
            'jabatan' => 'required',
            'id_perusahaan' => 'required',
            'password' => 'required|min:6'
        ]);

        $jabatan = strtolower(trim($request->jabatan));
        $idPerusahaan = trim($request->id_perusahaan);

        // 🔥 KHUSUS DIREKTUR UTAMA
        if ($jabatan === 'direktur utama') {

            $cekDirektur = Direksi::where('id_perusahaan', $idPerusahaan)
                ->whereRaw('LOWER(jabatan) = ?', ['direktur utama'])
                ->first();

            if ($cekDirektur) {
                return back()->with('error', 'Direktur utama sudah terdaftar untuk perusahaan ini');
            }

            Direksi::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'jabatan' => $jabatan, // 🔥 simpan sudah lowercase
                'id_perusahaan' => $idPerusahaan,
                'password' => bcrypt($request->password)
            ]);

            return redirect('/')->with('success', 'Registrasi Direktur Utama berhasil');
        }

        // 🔥 DIREKSI LAIN
        $cek = Perusahaan::where('id_perusahaan', $idPerusahaan)->first();

        if (!$cek) {
            return back()->with('error', 'ID Perusahaan tidak terdaftar');
        }

        if (strtolower(trim($cek->direksi)) !== $jabatan) {
            return back()->with('error', 'Jabatan tidak sesuai dengan perusahaan');
        }

        Direksi::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan' => $jabatan, // 🔥 konsisten
            'id_perusahaan' => $idPerusahaan,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/')->with('success', 'Registrasi Direksi berhasil');
    }


    // ==================== LOGIN ====================
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'id_perusahaan' => 'required',
            'jabatan' => 'required'
        ]);

        $user = Direksi::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error_direksi', 'Akun tidak ditemukan');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error_direksi', 'Password salah');
        }

        // 🔥 NORMALISASI SEMUA DATA
        $inputId      = trim($request->id_perusahaan);
        $dbId         = trim($user->id_perusahaan);

        $inputJabatan = strtolower(trim($request->jabatan));
        $dbJabatan    = strtolower(trim($user->jabatan));

        if ($dbId !== $inputId) {
            return back()->with('error_direksi', 'ID Perusahaan tidak sesuai');
        }

        if ($inputJabatan !== $dbJabatan) {
            return back()->with('error_direksi', 'Jabatan tidak sesuai');
        }

        // 🔥 VALIDASI PERUSAHAAN (selain direktur utama)
        if ($dbJabatan !== 'direktur utama') {

            $perusahaan = Perusahaan::where('id_perusahaan', $inputId)->first();

            if (!$perusahaan) {
                return back()->with('error_direksi', 'ID Perusahaan tidak terdaftar');
            }

            $direksiDb = strtolower(trim($perusahaan->direksi));

            if ($direksiDb !== $dbJabatan) {
                return back()->with('error_direksi', 'Jabatan tidak sesuai dengan perusahaan');
            }
        }

        // ✅ LOGIN BERHASIL (DATA SUDAH BERSIH)
        session([
            'direksi_id'    => $user->id,
            'nama'          => $user->nama,
            'jabatan'       => $dbJabatan,   // 🔥 sudah lowercase
            'id_perusahaan' => $dbId         // 🔥 sudah trim
        ]);

        return redirect('/dashboard-direksi');
    }


    // ==================== DASHBOARD ====================
    public function dashboard()
    {
        $user = Direksi::find(session('direksi_id'));
        return view('dashboard', compact('user'));
    }


    // ==================== LOGOUT ====================
    public function logout()
    {
        session()->flush();
        return redirect('/')->with('success', 'Logout berhasil');
    }
}