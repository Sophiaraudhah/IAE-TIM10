<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pasien',
        'nama_pasien',
        'jenis_kelamin',
        'waktu_masuk',
    ];

    protected $primaryKey = 'id_pasien'; 

    protected $keyType = 'string'; 

    public $incrementing = true; //auto increment agar tidak double

    protected $table = 'db_pasiens'; 
}
