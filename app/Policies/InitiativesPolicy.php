<?php

namespace App\Policies;

use App\Initiative;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InitiativesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any initiatives.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the initiative.
     *
     * @param  \App\User  $user
     * @param  \App\Initiative  $initiative
     * @return mixed
     */
    public function view(User $user, Initiative $initiative)
    {
        if ($user->id === $initiative->user_id) { return true; }
        else {  foreach($user->roles as $role){
                if($role->name === 'initiatives-manager') return true;
                } return false;
        }
    }

    /**
     * Determine whether the user can create initiatives.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the initiative.
     *
     * @param  \App\User  $user
     * @param  \App\Initiative  $initiative
     * @return mixed
     */
    public function update(User $user, Initiative $initiative)
    {
        if ($user->id === $initiative->user_id) { return true; }
        else {  foreach($user->roles as $role){
                if($role->name === 'initiatives-manager') return true;
                } return false;
        }
    }

    public function moderate(User $user, Initiative $initiative)
    {
        foreach($user->roles as $role){
          if($role->name === 'initiatives-manager') return true;
          } return false;
    }

    /**
     * Determine whether the user can delete the initiative.
     *
     * @param  \App\User  $user
     * @param  \App\Initiative  $initiative
     * @return mixed
     */
    public function delete(User $user, Initiative $initiative)
    {
        //
    }

    /**
     * Determine whether the user can restore the initiative.
     *
     * @param  \App\User  $user
     * @param  \App\Initiative  $initiative
     * @return mixed
     */
    public function restore(User $user, Initiative $initiative)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the initiative.
     *
     * @param  \App\User  $user
     * @param  \App\Initiative  $initiative
     * @return mixed
     */
    public function forceDelete(User $user, Initiative $initiative)
    {
        //
    }
}
