<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permintaan_obats', function (Blueprint $table) {
            $table->id();
            $table->char('id_permintaan', 20);
            $table->string('nama_obat',100);
            $table->string('jumlah_obat',100);
            $table->string('harga_obat',100);
            $table->string('keterangan',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_obats');
    }
};
