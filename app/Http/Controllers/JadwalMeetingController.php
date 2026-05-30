<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalMeeting;

class JadwalMeetingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $data = JadwalMeeting::latest()->get();

        return view(
            'direktur.utama.jadwal-meeting.index',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE JADWAL
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view(
            'direktur.utama.jadwal-meeting.create',
            [
                'agenda' => session('agenda_meeting')
            ]
        );
         return view('direktur.utama.jadwal-meeting.create', [
        'agenda' => session('agenda_meeting'),
        'draft'  => session('draft')
    ]);
    }

    /*
    |--------------------------------------------------------------------------
    | STORE JADWAL
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([

            'judul'   => 'required|string|max:255',

            'tanggal' => 'required|date|before:2100-01-01',

            'jam'     => 'required',

            'lokasi'  => 'required|string|max:255',

            'peserta' => 'required',

        ], [

            'tanggal.before'   => 'Tanggal meeting terlalu jauh.',

            'tanggal.date'     => 'Format tanggal tidak valid.',

            'tanggal.required' => 'Tanggal meeting wajib diisi.'

        ]);

        // ambil agenda dari session
        $agenda = session('agenda_meeting');

        // cek agenda kosong
        if (!$agenda) {

            return redirect('/jadwal-meeting/create')
                ->with('error', 'Agenda meeting belum dibuat.');
        }

        JadwalMeeting::create([

            'judul'   => $request->judul,
            'tanggal' => $request->tanggal,
            'jam'     => $request->jam,
            'lokasi'  => $request->lokasi,
            'peserta' => $request->peserta,
            'agenda'  => $agenda,

        ]);

        // hapus session agenda setelah tersimpan
        session()->forget('agenda_meeting');

        return redirect('/jadwal-meeting')
            ->with('success', 'Jadwal meeting berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL AGENDA
    |--------------------------------------------------------------------------
    */
    public function agenda($id)
    {
        $meeting = JadwalMeeting::findOrFail($id);

        return view(
            'direktur.utama.jadwal-meeting.agenda',
            compact('meeting')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE AGENDA
    |--------------------------------------------------------------------------
    */
    public function createAgenda()
    {
        return view(
            'direktur.utama.jadwal-meeting.create-agenda',
            [
                'agenda' => session('agenda_meeting')
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE AGENDA
    |--------------------------------------------------------------------------
    */
    public function storeAgenda(Request $request)
    {
        $request->validate([
            'agenda' => 'required',
        ]);

        // simpan sementara ke session
        session([
            'agenda_meeting' => $request->agenda
        ]);

        // kembali ke halaman create
        return redirect('/jadwal-meeting/create')
            ->with('success', 'Agenda meeting berhasil disimpan sementara.');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $meeting = JadwalMeeting::findOrFail($id);

        $meeting->delete();

        return redirect('/jadwal-meeting')
            ->with('success', 'Jadwal meeting berhasil dihapus');
    }
public function clearAgenda()
{
    session()->forget('agenda_meeting');

    return response()->json([
        'success' => true
    ]);
}
    
}