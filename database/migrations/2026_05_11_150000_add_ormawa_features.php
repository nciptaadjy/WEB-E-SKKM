<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add link_form to events table for Google Form registration
        Schema::table('events', function (Blueprint $table) {
            $table->string('link_form')->nullable()->after('foto_event');
            $table->string('nama_event')->nullable()->after('judul_event');
        });

        // Batch penomoran sertifikat - requested by Ormawa, approved by Kemahasiswaan
        Schema::create('batch_penomoran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table->foreignId('requested_by')->constrained('users'); // ormawa user
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('format_nomor')->nullable(); // e.g. "SKKM/{nomor}/BEM/2024"
            $table->text('catatan')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users'); // kemahasiswaan user
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });

        // Individual certificate numbers generated from a batch
        Schema::create('nomor_sertifikat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('batch_id')->constrained('batch_penomoran')->cascadeOnDelete();
            $table->foreignId('peserta_event_id')->constrained('peserta_events')->cascadeOnDelete();
            $table->string('nomor_sertifikat')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nomor_sertifikat');
        Schema::dropIfExists('batch_penomoran');

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['link_form', 'nama_event']);
        });
    }
};
