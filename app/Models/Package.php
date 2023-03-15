<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    /**
     * Relation un à plusieurs avec reservations
     *
     * @return object \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
}
