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
        Schema::create('peserta_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')
                  ->constrained('events')
                  ->cascadeOnDelete();
            $table->foreignId('mahasiswa_id')
                  ->constrained('mahasiswas')
                  ->cascadeOnDelete();
            $table->foreignId('kedudukan_id')
                  ->constrained('kedudukans');
            // kedudukan peserta di event ini
            // contoh: peserta, panitia, pengurus
            $table->enum('status_sertifikat', [
                'belum_generate',
                'sudah_generate',
                'rejected'
            ])->default('belum_generate');
            $table->timestamps();

            // 1 mahasiswa hanya bisa terdaftar
            // sekali per event
            $table->unique(['event_id', 'mahasiswa_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_events');
    }
};
