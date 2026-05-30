<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;

class PerusahaanController extends Controller
{
    public function index()
    {
        $data = Perusahaan::all();
        return view('direktur.utama.id-perusahaan.index', compact('data'));
    }

    public function store(Request $request)
{
    $request->validate([
        'direksi' => 'required',
        'id_perusahaan' => 'required|unique:perusahaans,id_perusahaan'
    ]);

    Perusahaan::create([
        'direksi' => $request->direksi,
        'id_perusahaan' => $request->id_perusahaan
    ]);

    return redirect('/id-perusahaan')->with('success', 'Data berhasil ditambahkan');
}

public function destroy($id)
{
    $data = Perusahaan::find($id);

    if ($data) {
        $data->delete();
    }

    return redirect('/id-perusahaan')->with('success', 'Data berhasil dihapus');
}
}