<?php

namespace app\Policies;

use app\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the user.
     *
     * @param  \app\User  $user
     * @param  \app\User  $user
     * @return mixed
     */
    public function view(User $user, User $user)
    {
        //
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \app\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
		echo '有没有权限';die;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \app\User  $user
     * @param  \app\User  $user
     * @return mixed
     */
    public function update(User $user, User $user)
    {
        //
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \app\User  $user
     * @param  \app\User  $user
     * @return mixed
     */
    public function delete(User $user, User $user)
    {
        //
    }
}
