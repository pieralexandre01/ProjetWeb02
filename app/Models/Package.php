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

    /**
     * Retourne une date passé en paramètre sur le format année-mois-jour
     *
     * @param date $db_date
     * @return date
     */
    public function formattedDate($db_date) {
        $date = new \DateTime($this->{$db_date});
        return $date->format('Y-m-d');
    }
}
