<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PengaturanAkunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengisianController;
use App\Http\Controllers\TransactionController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;

Route::group(['middleware' => ['auth', 'cekrole:admin']], function () {
    Route::get('/rekap', [PengisianController::class, 'rekap']);
    Route::get('/rekap/{id}/edit', [PengisianController::class, 'edit'])->name('tamu.edit');
    Route::put('/rekap/{id}/disetujui', [PengisianController::class, 'disetujui'])->name("tamu.disetujui");
    Route::put('/rekap/{id}/disetujuiUpdate', [PengisianController::class, 'disetujuiUpdate'])->name("tamu.disetujuiUpdate");
    Route::put('/rekap/{id}/disetujuiDgnCtt', [PengisianController::class, 'disetujuiDgnCtt'])->name("tamu.disetujuiDgnCtt");
    Route::put('/rekap/{id}/disetujuiDgnCttupdate', [PengisianController::class, 'disetujuiDgnCttupdate'])->name('tamu.disetujuiDgnCttupdate');
    Route::put('/rekap/{id}/update', [PengisianController::class, 'update'])->name('tamu.update');
    Route::delete('/rekap/{id}', [PengisianController::class, 'destroy'])->name('tamu.destroy');
    Route::get('/rekap/{id}/show', [PengisianController::class, 'show'])->name("tamu.show");
    Route::get('/hasilKunjung', [PengisianController::class, 'hasilKunjung']);
    Route::get('/hasilKunjung/{id}/assignedit', [PengisianController::class, 'assignedit'])->name('assign.edit');
    Route::put('/hasilKunjung/{id}/assignupdate', [PengisianController::class, 'assignupdate'])->name('assign.update');
    Route::get('/export-users', [ExportController::class, 'exportKunjungan'])->name('export.kunjungan');
    Route::get('/addUser', [PengaturanAkunController::class, 'index'])->name('addUser');
    Route::get('/register', [LoginController::class, 'register']);
    Route::get('/addUser/{id}/edit', [PengaturanAkunController::class, 'edit'])->name('user.edit');
    Route::put('/addUser/{id}', [PengaturanAkunController::class, 'update'])->name('user.update');
    Route::delete('/addUser/{id}', [PengaturanAkunController::class, 'destroy'])->name('user.destroy');
    Route::post('/saveregister', [LoginController::class, 'saveregister'])->name('saveregister');
});

Route::group(['middleware' => ['auth', 'cekrole:user']], function () {
    Route::get('/bukutamu', [PengisianController::class, 'index']);
    Route::get('/riwayat', [PengisianController::class, 'riwayat']);
    Route::get('/riwayat/{id}/show', [PengisianController::class, 'show'])->name("riwayat.show");
    Route::delete('/riwayat/{id}', [PengisianController::class, 'riwayatdestroy'])->name('riwayat.destroy');
    Route::post('/riwayat/addRiwayat', [PengisianController::class, 'addRiwayat'])->name("addRiwayat");
    Route::get('/hasil', [PengisianController::class, 'hasil']);
    Route::get('/pesan', [PengisianController::class, 'pesan']);
});

Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
