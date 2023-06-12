<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PermintaanObat;

class SeederKelolaPemObat extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelola_pem_obats')->insert([
            [
                'id_kelobat'=>6,
                'nama_obat'=>'sangobion',
                'jumlah_obat'=>'100',
                'harga_obat'=>'2000',
                'nama_supplier'=>'cv arta',
                'status'=>'pembelian selesai',
            ],
            [
                'id_kelobat'=>7,
                'nama_obat'=>'vitamin c',
                'jumlah_obat'=>'100',
                'harga_obat'=>'2000',
                'nama_supplier'=>'cv rama',
                'status'=>'selesai pembelian',
            ],
        ]);
    }

}
