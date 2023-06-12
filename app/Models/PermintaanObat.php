<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanObat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_permintaan','nama_obat','jumlah_obat','harga_obat','keterangan'
    ];
}
