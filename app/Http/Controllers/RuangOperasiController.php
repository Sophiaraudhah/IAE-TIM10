<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\RuangOperasi;

class RuangOperasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangOperasi = RuangOperasi::all();
        return response()->json($ruangOperasi, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pasien' => 'required',
            'tanggal' => 'required|date',
            'nama_ruang' => 'required',
            'no_ruang' => 'required',
            'harga_sewa' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $ruangOperasi = RuangOperasi::create($request->all());
        return response()->json(['message' => 'Data ruang berhasil ditambahkan'], 201);
    }

    public function show($id)
    {
        $ruangOperasi = RuangOperasi::find($id);

        if (!$ruangOperasi) {
            return response()->json(['error' => 'Ruang tidak ditemukan'], 404);
        }

        return response()->json($ruangOperasi, 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_pasien' => 'required',
            'tanggal' => 'required|date',
            'nama_ruang' => 'required',
            'no_ruang' => 'required',
            'harga_sewa' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $ruangOperasi = RuangOperasi::find($id);

        if (!$ruangOperasi) {
            return response()->json(['error' => 'Ruang tidak ditemukan'], 404);
        }

        $ruangOperasi->update($request->all());
        return response()->json(['message' => 'Data ruang berhasil diperbarui'], 200);
    }

    public function destroy($id)
    {
        $ruangOperasi = RuangOperasi::find($id);

        if (!$ruangOperasi) {
            return response()->json(['error' => 'Ruang tidak ditemukan'], 404);
        }

        $ruangOperasi->delete();
        return response()->json(['message' => 'Data ruang berhasil dihapus'], 200);
    }
}
