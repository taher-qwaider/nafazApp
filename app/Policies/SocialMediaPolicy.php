<?php

namespace App\Policies;

use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SocialMediaPolicy
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
        return $user->hasPermissionTo('read-social-media') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, SocialMedia $socialMedia)
    {
        //
//        return $user->hasPermissionTo('create-social-media') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

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
        return $user->hasPermissionTo('create-social-media') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, SocialMedia $socialMedia)
    {
        //
        return $user->hasPermissionTo('edit-social-media') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, SocialMedia $socialMedia)
    {
        //
        return $user->hasPermissionTo('delete-social-media') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, SocialMedia $socialMedia)
    {
        //
    }
}
