<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * Relation plusieurs à un avec user
     *
     * @return object \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation plusieurs à un avec package
     *
     * @return object \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package() {
        return $this->belongsTo(Package::class);
    }
}
