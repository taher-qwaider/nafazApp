<?php

namespace App\Policies;

use App\Models\Service;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ServicePolicy
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
        return $user->hasPermissionTo('read-services') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $servie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Service $servie)
    {
        //
//        return $user->hasPermissionTo('read-services') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

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
        return $user->hasPermissionTo('create-services') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $servie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Service $servie)
    {
        //
        return $user->hasPermissionTo('edit-services') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $servie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Service $servie)
    {
        //
        return $user->hasPermissionTo('delete-services') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Servie  $servie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Servie $servie)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Servie  $servie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Servie $servie)
    {
        //
    }
}
