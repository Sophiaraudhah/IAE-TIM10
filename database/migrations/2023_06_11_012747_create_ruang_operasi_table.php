<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruang_operasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->date('tanggal');
            $table->string('nama_ruang');
            $table->string('no_ruang');
            $table->decimal('harga_sewa', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruang_operasi');
    }
};
