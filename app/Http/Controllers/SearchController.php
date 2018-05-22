<?php

namespace FreelanceTest\Http\Controllers;

use FreelanceTest\Thread;
use FreelanceTest\Trending;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Trending $trending)
    {
        return view('threads.search', [
            'trending' => $trending->get()
        ]);
    }
}
