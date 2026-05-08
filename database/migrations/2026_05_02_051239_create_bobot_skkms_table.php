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
        Schema::create('bobot_skkms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kedudukan_id')
                  ->constrained('kedudukans')
                  ->cascadeOnDelete();
            $table->enum('tingkat', [
                'perguruan_tinggi',
                'regional',
                'nasional',
                'internasional'
            ])->nullable();
            // nullable karena Organisasi & Kegiatan Wajib
            // tidak punya tingkatan
            $table->float('bobot')->default(0);
            $table->foreignId('updated_by')
                  ->constrained('users');
            $table->timestamps();

            // 1 kedudukan + 1 tingkat = 1 bobot
            // mencegah duplikat data
            $table->unique(['kedudukan_id', 'tingkat']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobot_skkms');
    }
};
