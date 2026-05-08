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
        Schema::create('sub_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bidang_kegiatan_id')
                  ->constrained('bidang_kegiatan')
                  ->cascadeOnDelete();
            $table->string('nama_sub');
            $table->boolean('has_tingkat')->default(true);
            // has_tingkat = false untuk Organisasi & Kegiatan Wajib
            // karena tidak ada tingkatan PT/Regional/Nasional/Inter
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kegiatans');
    }
};
