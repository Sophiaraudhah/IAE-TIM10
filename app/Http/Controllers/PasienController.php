<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasiens;

//menampilkan semua data= sudah
//menampilkan data pasien sesuai id= sudah
//menambah data pasien baru= masih error
//meng-update data pasien= masih error

class PasienController extends Controller
{
    public function index() //menampilkan semua data pasien
    {
        $pasiens = Pasiens::all();
        return response()->json([
            'message' => 'Data pasien berhasil ditampilkan',
            'data' => $pasiens
        ], 200);
    }

    public function show($id_pasien) // menampilkan pasien sesuai id
    {
        $pasien = Pasiens::where('id_pasien', $id_pasien)->first();
    
        if (!$pasien) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    
        return response()->json([
            'message' => 'Data pasien berhasil ditampilkan',
            'data' => $pasien
        ], 200);
    }

    public function store(Request $request) // menambah data pasien baru
    {
        //
        $data = Pasiens::create([
            'id_pasien' => $request->id_pasien,
            'nama_pasien' => $request->nama_pasien,
            'jenis_kelamin' => $request->jenis_kelamin,
            'waktu_masuk' => $request->waktu_masuk,
        ]);
        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => $data
        ], 200);
    }

    public function update(Request $request, $id_pasien)
    {
        $data = $request->validate([
            'id_pasien' => 'required',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'waktu_masuk' => 'required',
        ]);

        $pasien = Pasiens::find($id_pasien);

        if (!$pasien) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $pasien->update($data);

        return response()->json([
            'message' => 'Data pasien berhasil diperbarui',
            'data' => $pasien
        ], 200);
    }

}
