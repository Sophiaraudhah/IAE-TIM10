<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\PembayaranPasienController;
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

// Route::prefix('pasiens')->group(function () {
//     Route::get('/', 'PasienController@index'); // menampilkan semua data
//     Route::post('/add', 'PasienController@store');     // menambah data
//     Route::get('/{id}', 'PasienController@show');   // menampilkan data sesuai id
//     Route::put('/{id}', 'PasienController@update'); // mengubah data sesuai id
// })->middleware('api')->domain('localhost:8000');

Route::apiResource('pasien', PasienController::class);
Route::apiResource('pembayaran', PembayaranPasienController::class);