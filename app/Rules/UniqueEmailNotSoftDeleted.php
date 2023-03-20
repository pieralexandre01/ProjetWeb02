<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class UniqueEmailNotSoftDeleted implements Rule
{
    /**
     * Création d'une variable pour déterminer si un user est soft deleted.
     *
     * @var bool
     */
    protected $softDeletedUserFound;

    /**
     * Crée une nouvelle règle d'instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->softDeletedUserFound = false;
    }

    /**
     * Détermine si la validation est true ou false.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) {
        $softDeletedUser = User::withTrashed()
            ->where('email', $value)
            ->whereNotNull('deleted_at')
            ->first();

        if ($softDeletedUser) {
            $this->softDeletedUserFound = true;
            return false;
        }

        return User::where('email', $value)
            ->whereNull('deleted_at')
            ->count() == 0;
    }

    /**
     * Retourne le message d'erreur personnalisé si le passes retourne false.
     *
     * @return string
     */
    public function message() {
        if ($this->softDeletedUserFound) {
            return 'Access denied: This account has been blocked.';
        }

        return 'This email address is already used.';
    }
}
