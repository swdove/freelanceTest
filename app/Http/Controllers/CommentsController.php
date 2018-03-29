<?php

namespace FreelanceTest\Http\Controllers;

use Illuminate\Http\Request;
use FreelanceTest\Post;
use FreelanceTest\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), [
            'body' => 'required|min:2'
        ]);
        $request = request();
        //create new comment
        auth()->user()->comment(            
            new Comment([
                'body' => $request->body,
                'post_id' => $post->id
            ])
        );

       // $post->addComment(request('body'));

        return back();
    }
}
