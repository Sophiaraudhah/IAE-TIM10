<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaPemObat extends Model
{
    use HasFactory;

     protected $fillable = [
        'id_kelobat','nama_obat','jumlah_obat','harga_obat','nama_supplier','status'
    ];
}
