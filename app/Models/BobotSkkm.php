<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BobotSkkm extends Model
{
    protected $fillable = [
        'kedudukan_id',
        'tingkat',
        'bobot',
        'updated_by',
    ];

    protected $casts = [
        'bobot' => 'float',
    ];

    public function kedudukan(): BelongsTo
    {
        return $this->belongsTo(Kedudukan::class, 'kedudukan_id');
    }

    public function updatedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
