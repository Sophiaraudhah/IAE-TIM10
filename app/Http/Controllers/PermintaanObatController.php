<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PermintaanObat;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;


class PermintaanObatController extends Controller
{
    public function index()
    {
        $PermintaanObat = PermintaanObat::all();

        if ($PermintaanObat->isEmpty()) {
            return response()->json([
                'error' => 'Data permintaan obat tidak ditemukan'
            ], 404);
        }
        
        return response()->json([
            'message' => 'Data permintaan obat berhasil ditampilkan',
            'data' => $PermintaanObat
        ], 200);
    }
 
    public function show($id)
    {
        $PermintaanObat = PermintaanObat::find($id);

        if($PermintaanObat){
            return response()->json([
                'message' => 'Data permintaan obat berhasil ditampilkan',
                'data' => $PermintaanObat
            ],200);
        }else{
            return response()->json([
                'message' => 'Data permintaan obat tidak ditemukan'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id_permintaan' => 'required|unique:permintaan_obats,id_permintaan',
            'nama_obat' => 'required',
            'jumlah_obat' => 'required',
            'harga_obat' => 'required',
            'keterangan' => 'required'
        ]);

        if($validator->fails()) {
            $errors = $validator->errors();

            $response = [
                'message' => 'data tidak berhasil ditambahkan',
                'errors' => $errors->all()
            ];

            return response()->json($validator->errors(),422);
        }else{
            $PermintaanObat = PermintaanObat::create([
                'id_permintaan' => $request->id_permintaan,
                'nama_obat' => $request->nama_obat,
                'jumlah_obat' => $request->jumlah_obat,
                'harga_obat' => $request->harga_obat,
                'keterangan' => $request->keterangan
            ]);

            $response = [
                'message' => 'Data permintaan obat berhasil ditambahkan',
                'data' => $PermintaanObat
            ];

            return response()->json($PermintaanObat,200);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nama_obat' => 'required',
            'jumlah_obat' => 'required',
            'harga_obat' => 'required',
            'keterangan' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(),422);
        }else{
            $PermintaanObat = PermintaanObat::find($id);

            if($PermintaanObat){
                $PermintaanObat->nama_obat = $request->nama_obat;
                $PermintaanObat->jumlah_obat = $request->jumlah_obat;
                $PermintaanObat->harga_obat = $request->harga_obat;
                $PermintaanObat->keterangan = $request->keterangan;
                $PermintaanObat->save();

                $response = [
                    'message' => 'Data permintaan obat berhasil diupdate',
                    'data' => $PermintaanObat
                ];

                return response()->json($PermintaanObat,200);
            }else{
                return response()->json([
                    'message' => 'Data tidak berhasil di update'
                ]);
            }
        }
    }

    
}
