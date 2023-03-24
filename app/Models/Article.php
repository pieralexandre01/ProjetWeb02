<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * Relation plusieurs à un avec user
     *
     * @return object \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec le modèle Category (plusieurs-à-un)
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * Retourne les 150 premiers caractères du texte
     *
     * @return string
     */
    public function getResumeAttribute() {
        return substr($this->text, 0, 150) . "...";
    }

    /**
     * Retourne le texte avec des sauts de ligne
     *
     * @return string
     */
    public function getFormattedTextAttribute() {
        return nl2br($this->text);
    }
}
