<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class UniqueEmailNotSoftDeleted implements Rule
{
    /**
     * Flag to determine if a soft-deleted user is found.
     *
     * @var bool
     */
    protected $softDeletedUserFound;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->softDeletedUserFound = false;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
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
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if ($this->softDeletedUserFound) {
            return 'Access denied: This account has been blocked.';
        }

        return 'This email address is already used.';
    }
}
