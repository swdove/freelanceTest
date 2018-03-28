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
        $post->addComment(request('body'));

        return back();
    }
}
