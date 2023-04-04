<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    /**
     * Relation plusieurs à un avec user
     *
     * @return object \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class)->withTrashed();
    }

    /**
     * Relation avec le modèle Category (plusieurs-à-un)
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * Retourne les 20 premiers mots sans jamais dépasser 150 caractères
     *
     * @return string
     */
    public function getSummaryAttribute() {
        $words = str_word_count($this->text, 1);
        $summary = '';

        foreach ($words as $word) {
            // Ajoute le mot actuel au sommaire
            $summary .= $word . ' ';

            // Arrête la boucle si on dépasse 150 caractères
            if (strlen($summary) > 150) {
                break;
            }
        }

        // Trim les espaces blanc au début et à la fin du string, puis concatène les ... au sommaire
        $summary = trim($summary);
        if (strlen($summary) < strlen($this->text)) {
            $summary .= '...';
        }

        return $summary;
    }

    /**
     * Retourne le texte avec des sauts de ligne
     *
     * @return string
     */
    public function getFormattedTextAttribute() {

        return nl2br($this->text);
    }

    /**
     * Retourne le nom complet de l'auteur d'un article
     *
     * @return void
     */
    public function getAuthorAttribute() {
        return $this->user->first_name . ' ' . $this->user->last_name;
    }

    /**
     * Retourne la valeur formatée de la colonne created_at dans la table articles
     *
     * @return void
     */
    public function getDateCreationAttribute() {
        return $this->created_at->format('Y-m-d');
    }

    /**
     * Retourne les deux premiers mots d'un titre d'article pour le fil d'Arianne
     *
     * @return void
     */
    public function getBreadcrumbTrailAttribute() {
        return Str::words($this->title, 2);
    }
}
