<?php

namespace FreelanceTest;

use Illuminate\Support\Facades\Redis;

class Trending
{
    public function get()
    {
        return array_map('json_decode', Redis::zrevrange('trending_threads', 0, 4));
    }

    public function push($thread)
    {
        //update trending thread set
        Redis::zincrby('trending_threads', 1, json_encode([
            'title' => $thread->title,
            'path' => $thread->path()
        ]));
    }
}