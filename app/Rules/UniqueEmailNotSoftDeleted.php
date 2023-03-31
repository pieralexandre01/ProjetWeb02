<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class UniqueEmailNotSoftDeleted implements Rule
{
    protected $softDeletedUserFound;
    protected $user_id;

    public function __construct($user_id = null)
    {
        $this->softDeletedUserFound = false;
        $this->user_id = $user_id;
    }

    public function passes($attribute, $value)
    {
        $query = User::where('email', $value);

        if ($this->user_id) {
            $query->where('id', '!=', $this->user_id);
        }

        $softDeletedUser = User::withTrashed()
            ->where('email', $value)
            ->whereNotNull('deleted_at')
            ->first();

        if ($softDeletedUser) {
            $this->softDeletedUserFound = true;
            return false;
        }

        return $query->whereNull('deleted_at')->count() == 0;
    }

    public function message()
    {
        if ($this->softDeletedUserFound) {
            return 'Access denied: This account has been blocked.';
        }

        return 'This email address is already used.';
    }
}
