<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'nama_pengguna',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // ── Relasi ──

    /** Sertifikat yang diverifikasi oleh user ini (sebagai BEM) */
    public function sertifikatsVerifiedBem(): HasMany
    {
        return $this->hasMany(Sertifikat::class, 'verified_by_bem');
    }

    /** Sertifikat yang diverifikasi oleh user ini (sebagai Kemahasiswaan) */
    public function sertifikatsVerifiedKhms(): HasMany
    {
        return $this->hasMany(Sertifikat::class, 'verified_by_khms');
    }

    /** Event yang dibuat oleh user ini (Ormawa/BEM) */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'user_id');
    }

    /** Bobot SKKM yang diupdate oleh user ini */
    public function bobotSkkms(): HasMany
    {
        return $this->hasMany(BobotSkkm::class, 'updated_by');
    }
}
