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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained('users');
            // ormawa/bem yang membuat event
            $table->foreignId('sub_kegiatan_id')
                  ->constrained('sub_kegiatans');
            // menentukan bobot poin peserta event ini
            $table->string('judul_event');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status_event', [
                'akan_datang',
                'berlangsung',
                'selesai'
            ])->default('akan_datang');
            $table->string('foto_event')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
