<?php

namespace FreelanceTest\Http\Controllers;

use Illuminate\Http\Request;

use FreelanceTest\Models\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index() 
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) 
    {
        return view('posts.show', compact('post'));
    }

    public function create() 
    {
        return view('posts.create');
    }    

    public function store() 
    {
        //validate
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        //create new post

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );
        //redirect
        return redirect('/posts');
    }
}
