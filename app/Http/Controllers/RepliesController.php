<?php

namespace FreelanceTest\Http\Controllers;

use FreelanceTest\Thread;
use FreelanceTest\Reply;
use FreelanceTest\User;
use FreelanceTest\Rules\SpamFree;
use Illuminate\Http\Request;
use FreelanceTest\Notifications\YouWereMentioned;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }
    public function index($channelId, Thread $thread)
    {
        return $thread->replies()->paginate(20);
    }

    public function store($channelId, Thread $thread)
    {
        if ($thread->locked) {
            return response('Thread is locked.', 422);
        }

        try {
            //check reply against rules in Policies\ReplyPolicy
            if (\Gate::denies('create', new Reply)) {
                return response(
                    'Calm down, fucker.', 429
                );
            }
            //check against validation rules
            $this->validate(request(), ['body' => ['required', new SpamFree]]);
            //create reply    
            $reply = $thread->addReply([
                'body' => request('body'),
                'user_id' => auth()->id()
            ]);
        } catch (\Exception $e) {
            return response('Spam detected!', 422);
        }

        if (request()->expectsJson()) {
            return $reply->load('owner');
        }
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

    public function update(Reply $reply, Spamfree $spamfree)
    {
        $this->authorize('update', $reply);

        request()->validate([
            'body' => ['required', $spamfree]
        ]);

        $reply->update(['body' => request('body')]);
    }
}
