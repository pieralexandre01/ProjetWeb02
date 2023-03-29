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

    /**
     * Retourne le titre sans le suffixe "- VR", "- AI" ou "- RBT"
     *
     * @return string
     */
    public function getCleanTitleAttribute() {
        $title = $this->title;

        if (str_starts_with($title, 'meet & greet')) {
            $title = str_replace(['- VR', '- AI', '- RBT'], '', $title);
        }

        return trim(strtolower($title));
    }
}
