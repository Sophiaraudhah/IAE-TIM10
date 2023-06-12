<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranPasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pembayaran_pasien',
        'id_pasien',
        'ket_pembayaran',
        'nominal',
    ];

    protected $primaryKey = 'id_pembayaran_pasien'; 

    protected $keyType = 'string'; 

    public $incrementing = true; //auto increment agar tidak double

    protected $table = 'pembayaranpasien'; 
}
