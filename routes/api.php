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

Route::get('PermintaanObat',[App\Http\Controllers\PermintaanObatController::class,'index']);
Route::get('PermintaanObat/{id_permintaan}',[App\Http\Controllers\PermintaanObatController::class,'show']);
Route::post('PermintaanObat',[App\Http\Controllers\PermintaanObatController::class,'store']);
Route::put('PermintaanObat/{id_permintaan}',[App\Http\Controllers\PermintaanObatController::class,'update']);

Route::get('KelolaPemObat',[App\Http\Controllers\KelolaPemObatController::class,'index']);
Route::get('KelolaPemObat/{id_permintaan}',[App\Http\Controllers\KelolaPemObatController::class,'show']);
Route::post('KelolaPemObat',[App\Http\Controllers\KelolaPemObatController::class,'store']);
Route::put('KelolaPemObat/{id_permintaan}',[App\Http\Controllers\KelolaPemObatController::class,'update']);

Route::apiResource('pasien', PasienController::class);
Route::apiResource('pembayaran', PembayaranPasienController::class);