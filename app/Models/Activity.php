<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    /**
     * Retourne la date formattée en fonction de notre design
     *
     * @return void
     */
    public function getFormattedDateAttribute() {
        $date = new \DateTime($this->date);
        return $date->format('Y-m-d \@ g:ia');
    }
}
