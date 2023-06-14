<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SeederKelolaPemObat::class);
        $this->call(SeederPasiens::class);
        $this->call(SeederPembayaranPasien::class);
        $this->call(SeederPermintaanObat::class);
        $this->call(PembayaranObat::class);
    }
}
