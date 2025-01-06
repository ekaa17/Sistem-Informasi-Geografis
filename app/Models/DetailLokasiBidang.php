<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLokasiBidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lokasi_bidangs',
        'latitude',
        'longitude',

    ];


    public function lokasi_bidang()
    {
        return $this->belongsTo(LokasiBidang::class, 'id_lokasi_bidangs');
    }

}
