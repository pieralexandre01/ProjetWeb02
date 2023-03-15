<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Relation plusieurs à un avec privilege
     *
     * @return object \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function privilege() {
        return $this->belongsTo(Privilege::class);
    }

    /**
     * Relation un à plusieurs avec article
     *
     * @return object \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles() {
        return $this->hasMany(Article::class);
    }

    /**
     * Relation un à plusieurs avec reservations
     *
     * @return object \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
