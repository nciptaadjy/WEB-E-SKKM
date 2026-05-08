<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pencapaian extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'mahasiswa_id',
        'total_keseluruhan',
    ];

    protected $casts = [
        'total_keseluruhan' => 'float',
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(PencapaianDetail::class);
    }

    /**
     * Hitung ulang total_keseluruhan dari sum pencapaian_details
     */
    public function recalculate(): void
    {
        $this->total_keseluruhan = $this->details()->sum('total_poin');
        $this->save();
    }
}
