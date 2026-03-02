<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmbpController;
use App\Http\Controllers\PendaftaranController;

Route::get('/', function () {
    return view('login');
});

Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/admin.dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/pendaftaran', [PendaftaranController::class, 'create']);
Route::post('/pendaftaran', [PendaftaranController::class, 'store']);

Route::get('/layout', fn() => view('layout.layout_footer'));

// SMBP Routes
Route::get('/beasiswa', [SmbpController::class, 'daftarBeasiswa'])->name('smbp.daftar');
Route::get('/beasiswa/{smbp}/pengajuan', [SmbpController::class, 'formPengajuan'])->name('smbp.pengajuan');
Route::post('/beasiswa/{smbp}/ajukan', [SmbpController::class, 'ajukanBeasiswa'])->name('smbp.ajukan');

Route::middleware(['auth'])->group(function () {
    Route::resource('smbp', SmbpController::class)->names([
        'index' => 'smbp.index',
        'create' => 'smbp.create',
        'store' => 'smbp.store',
        'show' => 'smbp.show',
        'edit' => 'smbp.edit',
        'update' => 'smbp.update',
        'destroy' => 'smbp.destroy',
    ]);
    
    Route::get('/smbp/{smbp}/pemohon', [SmbpController::class, 'kelolaPemohon'])->name('smbp.pemohon');
    Route::patch('/pemohon-smbp/{pemohon}/status', [SmbpController::class, 'updateStatus'])->name('pemohon-smbp.updateStatus');
});
