<?php

namespace App\Policies;


use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $admin
     * @return mixed
     */
    public function viewAny(User $admin)
    {
        //
        return $admin->hasPermissionTo('read-users') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $admin
     * @param  \App\Models\User  $city
     * @return mixed
     */
    public function view(User $admin, User $city)
    {
        //
//        return $admin->hasPermissionTo('read-users') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $admin
     * @return mixed
     */
    public function create(User $admin)
    {
        //
        return $admin->hasPermissionTo('create-users') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $admin
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function update(User $admin, User $user)
    {
        //
        return $admin->hasPermissionTo('edit-users') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $admin
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function delete(User $admin, User $user)
    {
        //
        return $admin->hasPermissionTo('delete-users') ? Response::allow() : Response::deny('YOU HAVE NO PERMISSION');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\City  $city
     * @return mixed
     */
    public function restore(Admin $admin, City $city)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\City  $city
     * @return mixed
     */
    public function forceDelete(Admin $admin, City $city)
    {
        //
    }
}
