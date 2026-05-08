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
        Schema::create('kedudukans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_kegiatan_id')
                  ->constrained('sub_kegiatans')
                  ->cascadeOnDelete();
            $table->string('nama_kedudukan');
            // Contoh: Penyaji, Penulis Utama, Peserta,
            //         Juara 1, Juara 2, Presma, Panitia
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kedudukans');
    }
};
