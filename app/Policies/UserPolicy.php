<?php

namespace FreelanceTest\Policies;

use FreelanceTest\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the thread.
     *
     * @param  \FreelanceTest\User  $user
     * @return mixed
     */
    public function view(User $user)
    {
        //
    }

    /**
     * Determine whether the user can create threads.
     *
     * @param  \FreelanceTest\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the thread.
     *
     * @param  \FreelanceTest\User  $user
     * @return mixed
     */
    public function update(User $user, User $signedInUser)
    {
        return $signedInUser->id === $user->id;
    }

    /**
     * Determine whether the user can delete the thread.
     *
     * @param  \FreelanceTest\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        //
    }
}
