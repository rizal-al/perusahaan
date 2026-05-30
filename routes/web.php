<?php

use Illuminate\Support\Facades\Route;
use App\Models\Perusahaan;
use App\Http\Controllers\DireksiController;
use App\Http\Controllers\TimDivisiController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\UtamaController;
use App\Http\Controllers\PemegangDireksiController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\SDMController;
use App\Http\Controllers\PemasaranController;
use App\Http\Controllers\JadwalMeetingController;


// ==================== LOGIN ====================
Route::get('/', fn() => view('login.login'))->name('login');

// dashboard umum
Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');


// ==================== DIREKSI (LOGIN & REGISTER) ====================
Route::get('/register-direksi', function () {
    $perusahaan = Perusahaan::all();
    return view('login.register-direksi', compact('perusahaan'));
});

Route::post('/register-direksi', [DireksiController::class, 'register']);
Route::post('/login-direksi', [DireksiController::class, 'login']);
Route::get('/dashboard-direksi', [DireksiController::class, 'dashboard']);


// ==================== DIVISI (LOGIN & REGISTER) ====================
Route::get('/register-divisi', fn() => view('login.register-divisi'));
Route::post('/register-divisi', [TimDivisiController::class, 'register']);
Route::post('/login-divisi', [TimDivisiController::class, 'login']);
Route::get('/dashboard-divisi', [TimDivisiController::class, 'dashboard']);


// ==================== LOGOUT ====================
Route::match(['get','post'], '/logout', [DireksiController::class, 'logout'])->name('logout');


// ==================== PERUSAHAAN ====================
Route::get('/id-perusahaan', [PerusahaanController::class, 'index']);
Route::post('/id-perusahaan', [PerusahaanController::class, 'store']);

Route::get('/id-perusahaan/create', fn() =>
    view('direktur.utama.id-perusahaan.create')
)->name('id-perusahaan.create');

Route::delete('/id-perusahaan/{id}', [PerusahaanController::class, 'destroy']);

Route::get('/direktur-utama', function () {
    return view('direktur.utama.akses');
})->name('direktur.utama');

Route::post('/cek-akses-direktur', [UtamaController::class, 'cekAkses']);
Route::get('/direktur-utama/home', [UtamaController::class, 'index']);

Route::get('/pemegang-direksi', [PemegangDireksiController::class, 'index']);

////////direktur keuangan

Route::get('/direktur-keuangan', function () {
    return view('direktur.keuangan.akses');
});

Route::post('/cek-akses-keuangan', [KeuanganController::class, 'cekAkses']);
Route::get('/direktur-keuangan/home', [KeuanganController::class, 'index']);

////////direktur operasi
use App\Http\Controllers\OperasiController;

Route::get('/direktur-operasi', function () {
    return view('direktur.operasi.akses');
});

Route::post('/cek-akses-operasi', [OperasiController::class, 'cekAkses']);
Route::get('/direktur-operasi/home', [OperasiController::class, 'index']);

/////sdm////
Route::get('/direktur-sdm', function () {
    return view('direktur.sdm.akses');
});
Route::post('/cek-akses-sdm', [SDMController::class, 'cekAkses'])
    ->name('sdm.cek');
Route::get('/direktur-sdm/home', [SDMController::class, 'index'])
    ->name('direktur.sdm.home');

/////pemasaran////
Route::get('/direktur-pemasaran', function () {
    return view('direktur.pemasaran.akses');
});
Route::post('/cek-akses-pemasaran', [PemasaranController::class, 'cekAkses'])
    ->name('pemasaran.cek');
Route::get('/direktur-pemasaran/home', [PemasaranController::class, 'index'])
    ->name('direktur.pemasaran.home');

  /////// JADWAL MEETING

Route::prefix('jadwal-meeting')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | HALAMAN UTAMA
    |--------------------------------------------------------------------------
    */
    Route::get('/', [
        JadwalMeetingController::class,
        'index'
    ])->name('jadwal.index');


    /*
    |--------------------------------------------------------------------------
    | CREATE MEETING
    |--------------------------------------------------------------------------
    */
    Route::get('/create', [
        JadwalMeetingController::class,
        'create'
    ])->name('jadwal.create');


    /*
    |--------------------------------------------------------------------------
    | SIMPAN MEETING FINAL
    |--------------------------------------------------------------------------
    */
    Route::post('/store', [
        JadwalMeetingController::class,
        'store'
    ])->name('jadwal.store');


    /*
    |--------------------------------------------------------------------------
    | CREATE AGENDA
    |--------------------------------------------------------------------------
    */
    Route::get('/agenda/create', [
        JadwalMeetingController::class,
        'createAgenda'
    ])->name('jadwal.agenda.create');


    /*
    |--------------------------------------------------------------------------
    | SIMPAN AGENDA SEMENTARA
    |--------------------------------------------------------------------------
    */
    Route::post('/agenda/store', [
        JadwalMeetingController::class,
        'storeAgenda'
    ])->name('jadwal.agenda.store');


    /*
    |--------------------------------------------------------------------------
    | DETAIL AGENDA
    |--------------------------------------------------------------------------
    */
    Route::get('/agenda/{id}', [
        JadwalMeetingController::class,
        'agenda'
    ])->name('jadwal.agenda');


    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    Route::delete('/delete/{id}', [
        JadwalMeetingController::class,
        'destroy'
    ])->name('jadwal.delete');

});

Route::post('/clear-agenda', function () {

    session()->forget('agenda_meeting');

    return response()->json([
        'success' => true
    ]);

});
