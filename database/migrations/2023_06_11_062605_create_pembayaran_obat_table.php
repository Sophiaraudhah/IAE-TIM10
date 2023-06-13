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
        Schema::create('pembayaran_obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pembayaran_obat')->nullable();
            $table->string('nama_obat');
            $table->string('ket_pembayaran')->nullable();
            $table->decimal('nominal', 8, 2);
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
        Schema::dropIfExists('pembayaran_obat');
    }
};
