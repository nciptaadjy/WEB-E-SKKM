<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kedudukan extends Model
{
    protected $fillable = [
        'sub_kegiatan_id',
        'nama_kedudukan',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function subKegiatan(): BelongsTo
    {
        return $this->belongsTo(SubKegiatan::class, 'sub_kegiatan_id');
    }

    public function bobotSkkms(): HasMany
    {
        return $this->hasMany(BobotSkkm::class, 'kedudukan_id');
    }

    public function sertifikats(): HasMany
    {
        return $this->hasMany(Sertifikat::class, 'kedudukan_id');
    }

    public function getBobotByTingkat(string $tingkat): float
    {
        return $this->bobotSkkms()
            ->where('tingkat', $tingkat)
            ->value('bobot') ?? 0;

    }
}
