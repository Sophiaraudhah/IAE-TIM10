<?php

namespace App\Http\Controllers;

use App\Models\PembayaranPasien;
use Illuminate\Http\Request;

//Menampilkan semua data pembayaran pembayaranpa$pembayaranpasien yang tersedia= sudah
//Menampilkan data pembayaran pembayaran pasien per id= sudah

class PembayaranPasienController extends Controller
{
        public function index()
        {
            $database_pembayaranpasien = PembayaranPasien::all();
            return response()->json([
                'message' => 'Data pembayaran berhasil ditampilkan',
                'data_pesanan' => $database_pembayaranpasien
            ], 200);
        }
        
        public function show($id_pembayaran_pasien)
        
        {
            $pembayaranpasien = PembayaranPasien::where('id_pembayaran_pasien', $id_pembayaran_pasien)->first();
        
            if (!$pembayaranpasien) {
                return response()->json([
                    'message' => 'Data tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'message' => 'Data pembayaran berhasil ditampilkan', 
                'data' => $pembayaranpasien
            ], 200);


        }

}
