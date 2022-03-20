<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserCreditAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserCreditActionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->isAdminPanelAccount();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserCreditAction  $userCreditAction
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, UserCreditAction $userCreditAction)
    {
        return $user->isAdminPanelAccount();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isAdminPanelAccount();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserCreditAction  $userCreditAction
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, UserCreditAction $userCreditAction)
    {
        return $user->isAdminPanelAccount();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserCreditAction  $userCreditAction
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, UserCreditAction $userCreditAction)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserCreditAction  $userCreditAction
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, UserCreditAction $userCreditAction)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserCreditAction  $userCreditAction
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, UserCreditAction $userCreditAction)
    {
        //
    }
}
