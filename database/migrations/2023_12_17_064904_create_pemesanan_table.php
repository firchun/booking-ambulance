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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->references('id')->on('pengguna');
            $table->foreignId('ambulance_id')->references('id')->on('ambulance');
            $table->integer('peti_id')->nullable();
            $table->integer('supir_id')->nullable();
            $table->date('tanggal_penjemputan');
            $table->time('waktu_penjemputan');
            $table->string('lokasi_penjemputan');
            $table->string('tujuan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
