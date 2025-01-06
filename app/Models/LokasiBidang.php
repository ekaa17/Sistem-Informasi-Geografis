<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiBidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'lokasi_bidang',
        'nama_bidang',
        'nama_pemilik',
        'luas_lahan',
        'atas_hak',
        'tanggal_transaksi',
    ];
}
