<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BatchPenomoran extends Model
{
    protected $table = 'batch_penomoran';

    protected $fillable = [
        'event_id',
        'nama_event',
        'kategori_event',
        'requested_by',
        'status',
        'format_nomor',
        'total_peserta',
        'catatan',
        'catatan_revisi',
        'approved_by',
        'approved_at',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function requester(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function nomorSertifikats(): HasMany
    {
        return $this->hasMany(NomorSertifikat::class, 'batch_id');
    }

    /** Peserta langsung (dari form/CSV input) */
    public function pesertaBatch(): HasMany
    {
        return $this->hasMany(BatchPeserta::class, 'batch_id');
    }
}
