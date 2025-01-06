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
            $table->id(); // Primary key
            $table->string('lokasi_bidang'); // Lokasi Bidang
            $table->string('blok'); // Nama Bidang
            $table->string('Bidang'); // Nama Bidang
            $table->string('nama_pemilik'); // Nama Pemilik
            $table->integer('luas_lahan'); // Luas Lahan
            $table->string('atas_hak'); // Atas Hak
            $table->date('tanggal_transaksi'); // Tanggal Transaksi
            $table->timestamps(); // Kolom created_at dan updated_at
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
