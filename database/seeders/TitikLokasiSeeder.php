<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TitikLokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_lokasi_bidangs')->insert([
            [
                'id_lokasi_bidangs' => 1, 
                'latitude' => -6.010560,
                'longitude' => 106.032773,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lokasi_bidangs' => 1,
                'latitude' => -6.010645,
                'longitude' => 106.032786,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lokasi_bidangs' => 1, 
                'latitude' => -6.010640,
                'longitude' => 106.032835,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lokasi_bidangs' => 1,
                'latitude' => -6.010556,
                'longitude' => 106.032822,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lokasi_bidangs' => 2,
                'latitude' => -6.010248, 
                'longitude' => 106.031355,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lokasi_bidangs' => 2, 
                'latitude' => -6.010396, 
                'longitude' => 106.031326,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lokasi_bidangs' => 2,  
                'latitude' => -6.010301, 
                'longitude' => 106.031453,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
