<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeederPasiens extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pasiens')->insert([
            [
                'id_pasien'=>1,
                'nama_pasien'=>'pia',
                'jenis_kelamin'=>'Wanita',
                'waktu_masuk'=>'14-06-2023',
            ],
            [
                'id_pasien'=>2,
                'nama_pasien'=>'pey',
                'jenis_kelamin'=>'Pria',
                'waktu_masuk'=>'15-06-2023',
            ],
        ]);
    }
}
