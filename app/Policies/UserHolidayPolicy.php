<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserHoliday;
use Illuminate\Auth\Access\HandlesAuthorization;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class UserHolidayPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserHoliday  $userHoliday
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, UserHoliday $userHoliday)
    {
        return $user->id === $userHoliday->user_id || $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserHoliday  $userHoliday
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, UserHoliday $userHoliday)
    {
        return $user->id === $userHoliday->user_id || $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserHoliday  $userHoliday
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, UserHoliday $userHoliday)
    {
        return $user->id === $userHoliday->user_id || $user->hasRole('Admin');
    }

    public function approve(User $user, UserHoliday $userHoliday)
    {
        return $user->can('approve holiday');
    }

    public function reject(User $user, UserHoliday $userHoliday)
    {
        return $user->can('reject holiday');
    }
}
