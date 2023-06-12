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
        Schema::create('kelola_pem_obats', function (Blueprint $table) {
            $table->id();
            $table->char('id_kelobat', 20);
            $table->string('nama_obat',100);
            $table->string('jumlah_obat',100);
            $table->string('harga_obat',100);
            $table->string('nama_supplier',100);
            $table->string('status',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelola_pem_obats');
    }
};
