<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BatchPeserta extends Model
{
    protected $table = 'batch_peserta';

    protected $fillable = [
        'batch_id',
        'identifier',
        'nama',
        'tipe',
        'mahasiswa_id',
        'nomor_sertifikat',
    ];

    public function batch(): BelongsTo
    {
        return $this->belongsTo(BatchPenomoran::class, 'batch_id');
    }

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
