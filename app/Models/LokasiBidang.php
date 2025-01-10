<?php

namespace App\Models;

use App\Models\DetailLokasiBidang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LokasiBidang extends Model
{
    use HasFactory;

    protected $table = 'lokasi_bidangs';
    // protected $guards = ['id'];

    protected $fillable = [
        'lokasi_bidang',
        'blok',
        'bidang',
        'nama_pemilik',
        'luas_lahan',
        'atas_hak',
        'tanggal_transaksi',
    ];

    public function detail_lokasi()
    {
        return $this->hasMany(DetailLokasiBidang::class, 'id_lokasi_bidangs');
    }
}
