<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use App\Models\PembayaranObat;

class PembayaranObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $response = $client -> get('http://127.0.0.1:8000/api/poliklinik/resep');
        $body = $response -> getBody() -> getContents();
        $data = json_decode($body, true);
        $data = $data['response'];
        // dd($data);
        if (PembayaranObat::exists()){
            $urutan = 0;
            foreach ($data as $obat){
                PembayaranObat::updateOrCreate(['id_pembayaran_obat' => $data[$urutan]['id_resep']],[
                    'id_pembayaran_obat' => $data[$urutan]['id_resep'],
                    'nama_obat' => $data[$urutan]['resep_obat'],
                    'nominal' => $data[$urutan]['jumlah_pembayaran'],
                ]);
                $urutan += 1;
            }
        }else{
            $urutan = 0;
            foreach ($data as $obat){
                PembayaranObat::create([
                    'id_pembayaran_obat' => $data[$urutan]['id_resep'],
                    'nama_obat' => $data[$urutan]['resep_obat'],
                    'nominal' => $data[$urutan]['jumlah_pembayaran'],
                ]);
                $urutan += 1;
            }
        }
        $pembayaranObat = PembayaranObat::all();
        return response()->json($pembayaranObat, 200);
    }

    public function show($id)
    {
        $pembayaranObat = PembayaranObat::find($id);

        if (!$pembayaranObat) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($pembayaranObat, 200);
    }

    public function update(Request $request, $id)
    {
        $pembayaranObat = PembayaranObat::find($id);
        if (!$pembayaranObat) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }else{
            $validator = Validator::make($request->all(), [
                'ket_pembayaran' => 'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }else{        
                $pembayaranObat->update($request->all());
                return response()->json(['message' => 'Data berhasil diperbarui'], 200);
            }
        }
    }
}
