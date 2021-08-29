<?php

namespace App\Policies;

use App\Models\Opinion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OpinionPolicy
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
        //
        return $user->hasPermissionTo('read-opinions') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Opinion $opinion)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        return $user->hasPermissionTo('create-opinions') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Opinion $opinion)
    {
        //
        return $user->hasPermissionTo('edit-opinions') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Opinion $opinion)
    {
        //
        return $user->hasPermissionTo('delete-opinions') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Opinion $opinion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Opinion $opinion)
    {
        //
    }
}
