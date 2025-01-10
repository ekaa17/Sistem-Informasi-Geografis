<?php

namespace App\Models;

use App\Models\LokasiBidang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailLokasiBidang extends Model
{
    use HasFactory;

    protected $table = 'detail_lokasi_bidangs';
    protected $guards = ['id'];

    // protected $fillable = [
    //     'id_lokasi_bidangs',
    //     'latitude',
    //     'longitude',

    // ];

    public function lokasi_bidang()
    {
        return $this->belongsTo(LokasiBidang::class, 'id_lokasi_bidangs');
    }

}
