<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->email === 'ymurazik@example.com';
    }

    /***
     * Determine whether the user can edit models.
     */
    public function edit(User $user, User $model): bool
    {
        return (bool) mt_rand(0, 1);
    }


}
