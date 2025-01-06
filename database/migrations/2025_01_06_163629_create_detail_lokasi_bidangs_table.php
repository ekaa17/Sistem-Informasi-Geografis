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
        Schema::create('detail_lokasi_bidangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lokasi_bidangs');
            $table->decimal('latitude', 12, 8); // Latitude (koordinat)
            $table->decimal('longitude', 12, 8); // Longitude (koordinat)
            $table->timestamps();
           
           
            $table->foreign('id_lokasi_bidangs')->references('id')->on('lokasi_bidangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_lokasi_bidangs');
    }
};
