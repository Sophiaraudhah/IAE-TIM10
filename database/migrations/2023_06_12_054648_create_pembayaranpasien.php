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
        Schema::create('pembayaranpasien', function (Blueprint $table) {
            $table->id('id_pembayaran_pasien');
            $table->foreignId('id_pasien')->references('id_pasien')->on('pasiens');
            $table->string('ket_pembayaran');
            $table->string('nominal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaranpasien');
    }
};
