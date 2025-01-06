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
                'Blok' => 'Blok A',
                'Bidang' => 'Bidang A',
                'nama_pemilik' => 'Pemilik A',
                // 'latitude' => 106.6468142,
                // 'longitude' => -6.3905425,
                'luas_lahan' => 1000,
                'atas_hak' => 'Hak Milik',
                'tanggal_transaksi' => '2024-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lokasi_bidang' => 'Lokasi B',
                'Blok' => 'Blok B',
                'Bidang' => 'Bidang B',
                'nama_pemilik' => 'Pemilik B',
                // 'latitude' => 106.6241473,
                // 'longitude' => -6.3732812,
                'luas_lahan' => 1500,
                'atas_hak' => 'Hak Guna Bangunan',
                'tanggal_transaksi' => '2024-01-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'lokasi_bidang' => 'Lokasi C',
                'Blok' => 'Blok C',
                'Bidang' => 'Bidang C',
                'nama_pemilik' => 'Pemilik C',
                // 'latitude' => 106.5450972,
                // 'longitude' => -6.3477758,
                'luas_lahan' => 2000,
                'atas_hak' => 'Hak Pakai',
                'tanggal_transaksi' => '2024-02-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
