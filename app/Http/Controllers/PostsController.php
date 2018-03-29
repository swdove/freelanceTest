<?php

namespace FreelanceTest\Http\Controllers;

use Illuminate\Http\Request;

use FreelanceTest\Post;
use FreelanceTest\Tag;
use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct()
    {
        //checks that user is logged in on "create" and other non-public pages.
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index(Tag $tag = null) 
    {
        return $tag->posts;

        //helper function to grab records in descending created order
        $posts = Post::latest();
        //if call includes a date filter request (archives), filter by month and year
        if (request(['month', 'year'])) {
            $posts->filter(request(['month', 'year']));
        }
        
        $posts = $posts->get();
        
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

        session()->flash(
            'message', 'Your post has been published.'
        );
        
        //redirect
        return redirect('/posts');
    }
}
