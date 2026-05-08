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
        Schema::create('sertifikats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')
                  ->constrained('mahasiswas')
                  ->cascadeOnDelete();
            $table->foreignId('kedudukan_id')
                  ->constrained('kedudukans');
            $table->enum('tingkat', [
                'perguruan_tinggi',
                'regional',
                'nasional',
                'internasional'
            ])->nullable();
            // nullable karena Organisasi & Kegiatan Wajib
            // tidak punya tingkatan
            $table->string('nama_kegiatan');
            $table->string('penyelenggara')->nullable();
            $table->enum('tipe_asal', [
                'dalam_kampus',
                'luar_kampus'
            ]);
            $table->date('tanggal_kegiatan');
            $table->string('link_sertifikat');
            $table->float('bobot_snapshot')->default(0);
            // snapshot bobot saat diajukan
            // aman kalau kemahasiswaan ubah bobot nanti
            $table->enum('status', [
                'pending',
                'verified_bem',
                'approved',
                'rejected'
            ])->default('pending');
            $table->text('catatan_reject')->nullable();
            // catatan_reject diisi BEM atau Kemahasiswaan
            // mahasiswa bisa lihat alasan penolakan dari sini
            $table->foreignId('verified_by_bem')
                  ->nullable()
                  ->constrained('users');
            $table->foreignId('verified_by_khms')
                  ->nullable()
                  ->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikats');
    }
};
