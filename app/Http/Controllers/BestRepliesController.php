<?php

namespace FreelanceTest\Http\Controllers;

use FreelanceTest\Reply;
use Illuminate\Http\Request;

class BestRepliesController extends Controller
{
    public function store(Reply $reply)
    {
        $this->authorize('update', $reply->thread);
        $reply->thread->markBestReply($reply);
    }
}
