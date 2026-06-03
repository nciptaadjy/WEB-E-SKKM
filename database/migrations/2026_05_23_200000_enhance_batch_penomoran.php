<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Enhance batch_penomoran table
        Schema::table('batch_penomoran', function (Blueprint $table) {
            $table->string('nama_event')->nullable()->after('event_id');
            $table->string('kategori_event')->nullable()->after('nama_event');
            $table->unsignedInteger('total_peserta')->default(0)->after('format_nomor');
            $table->text('catatan_revisi')->nullable()->after('catatan');
        });

        // Make event_id nullable + change status enum via raw SQL (avoids doctrine/dbal)
        if (config('database.default') === 'mysql') {
            \DB::statement("ALTER TABLE batch_penomoran MODIFY COLUMN event_id BIGINT UNSIGNED NULL");
            \DB::statement("ALTER TABLE batch_penomoran MODIFY COLUMN status ENUM('draft','pending','revision','approved','rejected','generated') DEFAULT 'draft'");
        }

        // New table: batch_peserta — standalone participants per batch
        Schema::create('batch_peserta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('batch_id')
                  ->constrained('batch_penomoran')
                  ->cascadeOnDelete();
            $table->string('identifier');       // NIM / ID / NIK
            $table->string('nama');             // Nama peserta
            $table->enum('tipe', ['mahasiswa', 'eksternal'])->default('eksternal');
            $table->foreignId('mahasiswa_id')
                  ->nullable()
                  ->constrained('mahasiswas')
                  ->nullOnDelete();
            $table->string('nomor_sertifikat')->nullable()->unique();
            $table->timestamps();

            // 1 identifier per batch (no duplicates)
            $table->unique(['batch_id', 'identifier']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('batch_peserta');

        if (config('database.default') === 'mysql') {
            \DB::statement("ALTER TABLE batch_penomoran MODIFY COLUMN status ENUM('pending','approved','rejected') DEFAULT 'pending'");
        }

        Schema::table('batch_penomoran', function (Blueprint $table) {
            $table->dropColumn(['nama_event', 'kategori_event', 'total_peserta', 'catatan_revisi']);
        });
    }
};
