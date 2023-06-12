<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeederPembayaranPasien extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pembayaranpasien')->insert([
            [
                'id_pembayaran_pasien'=>1,
                'id_pasien'=>1,
                'ket_pembayaran'=>'BPJS; Tindakan Checkup',
                'nominal'=>'100000',
            ],
            [
                'id_pembayaran_pasien'=>2,
                'id_pasien'=>2,
                'ket_pembayaran'=>'BPJS; Tindakan Trauma',
                'nominal'=>'100000',
            ],
        ]);
    }
}
