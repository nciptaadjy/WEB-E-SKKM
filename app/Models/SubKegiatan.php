<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubKegiatan extends Model
{
    protected $fillable = [
        'bidang_kegiatan_id',
        'nama_sub',
        'has_tingkat',
        'is_active',
    ];

    protected $casts = [
        'has_tingkat' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function bidangKegiatan(): BelongsTo
    {
        return $this->belongsTo(BidangKegiatan::class, 'bidang_kegiatan_id');
    }

    public function kedudukans(): HasMany
    {
        return $this->hasMany(Kedudukan::class, 'sub_kegiatan_id');
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'sub_kegiatan_id');
    }
}
