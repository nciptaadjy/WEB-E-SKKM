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
        Schema::create('pencapaian_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pencapaian_id')
                  ->constrained('pencapaians')
                  ->cascadeOnDelete();
            $table->foreignId('bidang_kegiatan_id')
                  ->constrained('bidang_kegiatan')
                  ->cascadeOnDelete();
            $table->float('total_poin')->default(0);
            // total poin per bidang kegiatan
            // contoh: Akademik & Ilmiah → 12 poin
            //         Organisasi & Sosial → 15 poin

            // 1 pencapaian hanya punya 1 row per bidang
            // kalau bidang bertambah, tinggal insert row baru
            // tidak perlu ubah struktur tabel
            $table->unique(['pencapaian_id', 'bidang_kegiatan_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencapaian_details');
    }
};
