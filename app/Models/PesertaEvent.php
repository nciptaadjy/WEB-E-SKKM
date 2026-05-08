<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PesertaEvent extends Model
{
    protected $fillable = [
        'event_id',
        'mahasiswa_id',
        'kedudukan_id',
        'status_sertifikat',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function kedudukan(): BelongsTo
    {
        return $this->belongsTo(Kedudukan::class, 'kedudukan_id');
    }
}
