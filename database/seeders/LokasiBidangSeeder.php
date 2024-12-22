<?php

namespace Database\Seeders;

use App\Models\LokasiBidang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LokasiBidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LokasiBidang::insert([
            [
                'lokasi_bidang' => 'Lokasi A',
                'nama_bidang' => 'Bidang A',
                'nama_pemilik' => 'Pemilik A',
                'latitude' => -6.21462,
                'longitude' => 106.84513,
                'luas_lahan' => 1000,
                'atas_hak' => 'Hak Milik',
                'tanggal_transaksi' => '2024-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lokasi_bidang' => 'Lokasi B',
                'nama_bidang' => 'Bidang B',
                'nama_pemilik' => 'Pemilik B',
                'latitude' => -6.91746,
                'longitude' => 107.61912,
                'luas_lahan' => 1500,
                'atas_hak' => 'Hak Guna Bangunan',
                'tanggal_transaksi' => '2024-01-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lokasi_bidang' => 'Lokasi C',
                'nama_bidang' => 'Bidang C',
                'nama_pemilik' => 'Pemilik C',
                'latitude' => -7.25044,
                'longitude' => 112.76884,
                'luas_lahan' => 2000,
                'atas_hak' => 'Hak Pakai',
                'tanggal_transaksi' => '2024-02-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
