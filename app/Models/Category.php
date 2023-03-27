<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Relation avec le modèle Article (un-à-plusieurs)
     */
    public function articles(){
        return $this->hasMany(Article::class);
    }

    /**
     * Retourne le nom d'une
     *
     * @return void
     */
    public function getNameReferenceAttribute() {
        return strtolower(str_replace(' ', '_', $this->name));
    }
}
