<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KelolaPemObat;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class KelolaPemObatController extends Controller
{
    public function index()
    {
        if ($KelolaPemObat->isEmpty()) {
            return response()->json([
                'error' => 'Data kelola pembelian obat tidak ditemukan'
            ], 404);
        }
        
        return response()->json([
            'message' => 'Data kelola pembelian obat berhasil ditampilkan'
        ], 200);
    }
 
    public function show($id)
    {
        $KelolaPemObat = KelolaPemObat::find($id);

        if($KelolaPemObat){
            return response()->json([
                'message' => 'Data kelola pembelian obat berhasil ditampilkan'
            ],200);
        }else{
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id_kelobat' => 'required|unique:kelola_pem_obats,id_kelobat',
            'nama_obat' => 'required',
            'jumlah_obat' => 'required',
            'harga_obat' => 'required',
            'nama_supplier' => 'required',
            'status' => 'required'    
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(),422);
        }else{
            $KelolaPemObat = KelolaPemObat::create([
                'id_kelobat' => $request->id_kelobat,
                'nama_obat' => $request->nama_obat,
                'jumlah_obat' => $request->jumlah_obat,
                'harga_obat' => $request->harga_obat,
                'nama_supplier' => $request->nama_supplier,
                'status' => $request->status
            ]);

        return response()->json($KelolaPemObat,200);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nama_obat' => 'required',
            'jumlah_obat' => 'required',
            'harga_obat' => 'required',
            'nama_supplier' => 'required',
            'status' => 'status'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(),422);
        }else{
            $KelolaPemObat = KelolaPemObat::find($id);

            if($KelolaPemObat){
                $KelolaPemObat->nama_obat = $request->nama_obat;
                $KelolaPemObat->jumlah_obat = $request->jumlah_obat;
                $KelolaPemObat->harga_obat = $request->harga_obat;
                $KelolaPemObat->keterangan = $request->keterangan;
                $KelolaPemObat->save();

                return response()->json($KelolaPemObat,200);
            }else{
                return response()->json([
                    'message' => 'Data tidak berhasil di update'
                ]);
            }
        }
    }
}
