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
        Schema::create('sertifikat_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sertifikat_id')
                  ->constrained('sertifikats')
                  ->cascadeOnDelete();
            $table->string('nomor_sertifikat')->unique();
            // format nomor otomatis, contoh:
            // SKKM/2024/001
            $table->foreignId('generated_by')
                  ->constrained('users');
            // siapa dari kemahasiswaan yang generate
            $table->timestamp('generated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikat_details');
    }
};
