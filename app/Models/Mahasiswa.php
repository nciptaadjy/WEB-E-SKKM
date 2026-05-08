<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'password',
        'prodi',
        'fakultas',
        'angkatan',
        'sso_token',
        'last_login',
    ];

    protected $hidden = [
        'password',
        'sso_token',
        'remember_token',
    ];

    protected $casts = [
        'angkatan' => 'integer',
        'last_login' => 'datetime',
    ];

    public function sertifikats(): HasMany
    {
        return $this->hasMany(Sertifikat::class, 'mahasiswa_id');
    }

    public function pencapaian(): HasOne
    {
        return $this->hasOne(Pencapaian::class, 'mahasiswa_id');
    }

    public function pesertaEvents(): HasMany
    {
        return $this->hasMany(PesertaEvent::class, 'mahasiswa_id');
    }
}
