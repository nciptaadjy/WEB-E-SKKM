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
        Schema::create('pencapaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')
                  ->constrained('mahasiswas')
                  ->cascadeOnDelete();
            $table->float('total_keseluruhan')->default(0);
            // dihitung otomatis dari sum pencapaian_details
            $table->timestamp('updated_at')->useCurrent();

            // 1 mahasiswa = 1 row pencapaian
            $table->unique('mahasiswa_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencapaians');
    }
};
