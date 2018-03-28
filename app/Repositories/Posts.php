<?php

namespace FreelanceTest\Repositories;

use FreelanceTest\Post;

class Posts
{
    public function all()
    {
        return Post::all();
    }
}