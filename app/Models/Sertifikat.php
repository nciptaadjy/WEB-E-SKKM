<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sertifikat extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'kedudukan_id',
        'tingkat',
        'nama_kegiatan',
        'penyelenggara',
        'tipe_asal',
        'tanggal_kegiatan',
        'link_sertifikat',
        'bobot_snapshot',
        'status',
        'catatan_reject',
        'verified_by_bem',
        'verified_by_khms',
    ];

    protected $casts = [
        'tanggal_kegiatan' => 'date',
        'bobot_snapshot' => 'float',
    ];

    // ── Relasi ──

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function kedudukan(): BelongsTo
    {
        return $this->belongsTo(Kedudukan::class, 'kedudukan_id');
    }

    public function verifierBem(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by_bem');
    }

    public function verifierKhms(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by_khms');
    }

    // public function detail(): HasOne
    // {
    //     return $this->hasOne(SertifikatDetail::class, 'sertifikat_id');
    // }

    // ── Helpers ──

    public function getBidangKegiatan()
    {
        return $this->kedudukan?->subKegiatan?->bidangKegiatan;
    }
}
