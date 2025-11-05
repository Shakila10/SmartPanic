<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('laporans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pelapor');
        $table->string('jenis_laporan');
        $table->text('deskripsi');
        $table->string('lokasi');
        $table->string('foto_kejadian')->nullable();
        $table->string('status')->default('Menunggu Verifikasi');
        $table->timestamps();
    });

}

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};


