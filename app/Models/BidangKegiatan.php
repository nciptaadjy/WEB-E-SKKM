<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BidangKegiatan extends Model
{
    protected $table = 'bidang_kegiatan';

    protected $fillable = [
        'nama_bidang',
        'is_wajib',
        'is_active',
    ];

    protected $casts = [
        'is_wajib' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function subKegiatans(): HasMany
    {
        return $this->hasMany(SubKegiatan::class, 'bidang_kegiatan_id');
    }

    public function pencapaianDetails(): HasMany
    {
        return $this->hasMany(PencapaianDetail::class, 'bidang_kegiatan_id');
    }
}
