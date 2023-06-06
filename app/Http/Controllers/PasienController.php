<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index() 
    {
        $pasien = Pasien::all();
        return response()->json([
            'message' => 'Data pasien berhasil ditampilkan',
            'data' => $pasien
        ], 200);
    }

    public function store(Request $request) // menambah data
    {
        $data = $request->validate([
            'id_pasien' => 'required',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'waktu_masuk' => 'required',
        ]);

        $pasien = Pasien::create($data);
        return response()->json([
            'message' => 'Data pasien berhasil disimpan',
            'data' => $pasien
        ], 201);
    }

    public function show($id) // menampilkan data sesuai id
    {
        $pasien = Pasien::find($id);

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

    public function update(Request $request, $id) // mengubah data sesuai id
    {
        $data = $request->validate([
            'id_pasien' => 'required',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'waktu_masuk' => 'required',
        ]);

        $pasien = Pasien::find($id);

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
