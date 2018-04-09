<?php

namespace FreelanceTest\Policies;

use FreelanceTest\User;
use FreelanceTest\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the thread.
     *
     * @param  \FreelanceTest\User  $user
     * @param  \FreelanceTest\Thread  $thread
     * @return mixed
     */
    public function view(User $user, Thread $thread)
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
     * @param  \FreelanceTest\Thread  $thread
     * @return mixed
     */
    public function update(User $user, Thread $thread)
    {
        return $thread->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the thread.
     *
     * @param  \FreelanceTest\User  $user
     * @param  \FreelanceTest\Thread  $thread
     * @return mixed
     */
    public function delete(User $user, Thread $thread)
    {
        //
    }
}
