<?php

namespace App\Policies;

use App\Models\Dana;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DanaPolicy
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
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return in_array($user->jabatan_id, [
            Jabatan::SUPER_ADMIN,
            Jabatan::ADMIN,
            Jabatan::BENDAHARA,
            Jabatan::WARGA,
        ], true);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->jabatan_id === Jabatan::BENDAHARA
            ? Response::allow()
            : Response::deny('You are not authorized to create dana.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dana  $dana
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Dana $dana)
    {
        return $user->jabatan_id === Jabatan::BENDAHARA && $user->id === $dana->user_id
            ? Response::allow()
            : Response::deny('You are not authorized to update dana.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dana  $dana
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Dana $dana)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dana  $dana
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Dana $dana)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dana  $dana
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Dana $dana)
    {
        //
    }
}
