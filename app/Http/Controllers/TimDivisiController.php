<?php

namespace App\Http\Controllers;

use App\Models\TimDivisi;
use Illuminate\Http\Request;

class TimDivisiController extends Controller
{
    public function register(Request $request)
    {
        TimDivisi::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'tim_divisi' => $request->tim_divisi,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login')->with('success', 'Registrasi Tim Divisi berhasil');
    }

    public function login(Request $request)
    {
        $user = TimDivisi::where('email', $request->email)->first();

        if ($user && password_verify($request->password, $user->password)) {
            session(['tim_id' => $user->id]);
            return redirect('/dashboard-tim');
        }

        return back()->with('error_divisi', 'Data Tidak Sesuai');
    }

    public function dashboard()
    {
        $user = TimDivisi::find(session('tim_id'));
        return view('tim.dashboard', compact('user'));
    }
}