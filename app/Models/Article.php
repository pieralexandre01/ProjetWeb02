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

    // accesseur de 150 caractères pour la vue
}
