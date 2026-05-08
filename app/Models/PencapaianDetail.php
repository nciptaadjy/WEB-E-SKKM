<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PencapaianDetail extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'pencapaian_id',
        'bidang_kegiatan_id',
        'total_poin',
    ];

    protected $casts = [
        'total_poin' => 'float',
    ];

    public function pencapaian(): BelongsTo
    {
        return $this->belongsTo(Pencapaian::class, 'pencapaian_id');
    }

    public function bidangKegiatan(): BelongsTo
    {
        return $this->belongsTo(BidangKegiatan::class, 'bidang_kegiatan_id');
    }
}
