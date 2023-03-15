<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    /**     
    * Relation plusieurs à plusieurs avec users     
    *     
    * @return object \Illuminate\Database\Eloquent\Relations\BelongsToMany     
    */
    public function users() {
        return $this->belongsToMany(User::class);
    }
}
