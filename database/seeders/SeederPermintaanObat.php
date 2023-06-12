<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PermintaanObat;

class SeederPermintaanObat extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permintaan_obats')->insert([
            [
                'id_permintaan'=>5,
                'nama_obat'=>'sangobion',
                'jumlah_obat'=>'100',
                'harga_obat'=>'2000',
                'keterangan'=>'stok habis',
            ],
            [
                'id_permintaan'=>6,
                'nama_obat'=>'vitamin c',
                'jumlah_obat'=>'200',
                'harga_obat'=>'4000',
                'keterangan'=>'stok habis',
            ],
        ]);
    }

}
