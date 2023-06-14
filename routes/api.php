<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\PembayaranPasienController;
use App\Http\Controllers\api\PermintaanObatController;
use App\Http\Controllers\api\KelolaPemObatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/administrasi')->group(function () {
    Route::get('PermintaanObat',[App\Http\Controllers\PermintaanObatController::class,'index']);
    Route::get('PermintaanObat/{id_permintaan}',[App\Http\Controllers\PermintaanObatController::class,'show']);
    Route::post('PermintaanObat',[App\Http\Controllers\PermintaanObatController::class,'store']);
    Route::put('PermintaanObat/{id_permintaan}',[App\Http\Controllers\PermintaanObatController::class,'update']);

    Route::get('KelolaPemObat',[App\Http\Controllers\KelolaPemObatController::class,'index']);
    Route::get('KelolaPemObat/{id_permintaan}',[App\Http\Controllers\KelolaPemObatController::class,'show']);
    Route::post('KelolaPemObat',[App\Http\Controllers\KelolaPemObatController::class,'store']);
    Route::put('KelolaPemObat/{id_permintaan}',[App\Http\Controllers\KelolaPemObatController::class,'update']);

    Route::apiResource('pasien', PasienController::class); // termasuk get all pasien, get pasien by id, post pasien, put pasien
    Route::apiResource('pembayaran', PembayaranPasienController::class); // termasuk get all pembayaran dan get pembayaran by id

    Route::get('/ruang_operasi', [RuangOperasiController::class, 'index']);
    Route::post('/ruang_operasi', [RuangOperasiController::class, 'store']);
    Route::get('/ruang_operasi/{id}', [RuangOperasiController::class, 'show']);
    Route::put('/ruang_operasi/{id}', [RuangOperasiController::class, 'update']);
    Route::delete('/ruang_operasi/{id}', [RuangOperasiController::class, 'destroy']);

    Route::get('/pembayaran_obat', [PembayaranObatController::class, 'index']);
    Route::get('/pembayaran_obat/{id}', [PembayaranObatController::class, 'show']);
    Route::put('/pembayaran_obat/{id}', [PembayaranObatController::class, 'update']);
});