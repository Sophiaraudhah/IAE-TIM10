<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembayaranObat extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pembayaran_obat') ->insert([
            [
                'id_pembayaran_obat' => 1,
                'nama_obat' => 'antibiotik',
                'ket_pembayaran' => 'belum lunas',
                'nominal' => 50000,
            ],
            [
                'id_pembayaran_obat' => 2,
                'nama_obat' => 'vitamin',
                'ket_pembayaran' => 'lunas',
                'nominal' => 50000,
            ],
        ]);
    }
}
