<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sertifikats', function (Blueprint $table) {
            $table->text('catatan_revisi_khms')->nullable()->after('catatan_reject');
            $table->timestamp('verified_bem_at')->nullable()->after('verified_by_khms');
            $table->timestamp('verified_khms_at')->nullable()->after('verified_bem_at');
        });

        // Add 'revision' to the status enum — MySQL specific
        if (config('database.default') === 'mysql') {
            \DB::statement("ALTER TABLE sertifikats MODIFY COLUMN status ENUM('pending','verified_bem','approved','rejected','revision') DEFAULT 'pending'");
        }
    }

    public function down(): void
    {
        if (config('database.default') === 'mysql') {
            \DB::statement("ALTER TABLE sertifikats MODIFY COLUMN status ENUM('pending','verified_bem','approved','rejected') DEFAULT 'pending'");
        }

        Schema::table('sertifikats', function (Blueprint $table) {
            $table->dropColumn(['catatan_revisi_khms', 'verified_bem_at', 'verified_khms_at']);
        });
    }
};
