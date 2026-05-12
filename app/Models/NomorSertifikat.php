<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NomorSertifikat extends Model
{
    protected $table = 'nomor_sertifikat';

    protected $fillable = [
        'batch_id',
        'peserta_event_id',
        'nomor_sertifikat',
    ];

    public function batch(): BelongsTo
    {
        return $this->belongsTo(BatchPenomoran::class, 'batch_id');
    }

    public function pesertaEvent(): BelongsTo
    {
        return $this->belongsTo(PesertaEvent::class, 'peserta_event_id');
    }
}
