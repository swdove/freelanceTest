<?php

namespace FreelanceTest\Http\Controllers;

use FreelanceTest\Thread;
use FreelanceTest\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store($channelId, Thread $thread)
    {
        $this->validate(request(), [
            'body' => 'required'
        ]);
        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        return back()
            ->with('flash', 'Your reply has been posted.');
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('update', $reply);
        $reply->delete();
        if(request()->expectsJson()){
            return response(['status' => 'Reply deleted.']);
        }
        return back();
    }

    public function update(Reply $reply)
    {
        $reply->update(['body' => request('body')]);
    }
}
