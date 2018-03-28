<?php

namespace FreelanceTest\Repositories;

use FreelanceTest\Models\Post;

class Posts
{
    public function all()
    {
        return Post::all();
    }
}