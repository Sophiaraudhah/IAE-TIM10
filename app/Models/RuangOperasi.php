<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangOperasi extends Model
{
    use HasFactory;

    protected $table = 'ruang_operasi';

    protected $fillable = [
        'nama_pasien',
        'tanggal',
        'nama_ruang',
        'no_ruang',
        'harga_sewa',
    ];
}
