<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranObat extends Model
{
    use HasFactory;

    protected $table='pembayaran_obat';
    protected $fillable = [
        'id_pembayaran_obat',
        'nama_obat',
        'ket_pembayaran',
        'nominal',
    ];

    public function resep()
    {
        return $this->belongsTo(Resep::class, 'id_pembayaran_obat', 'id_resep');
    }
}
