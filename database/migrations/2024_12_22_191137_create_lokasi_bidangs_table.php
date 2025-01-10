<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lokasi_bidangs', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi_bidang');
            $table->string('blok'); 
            $table->string('bidang'); 
            $table->string('nama_pemilik'); 
            $table->integer('luas_lahan'); 
            $table->string('atas_hak'); 
            $table->date('tanggal_transaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_bidangs');
    }
};
