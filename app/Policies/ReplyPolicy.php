<?php

namespace FreelanceTest\Policies;

use FreelanceTest\User;
use FreelanceTest\Reply;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Reply $reply)
    {
        return $reply->user_id == $user->id;
    }

    public function create(User $user)
    {
        $lastReply = $user->lastReply;
        if (! $lastReply) return true;
        return ! $lastReply->wasJustPublished();
    }
}
