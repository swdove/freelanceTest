<?php

namespace FreelanceTest\Http\Controllers\Api;

use Illuminate\Http\Request;
use FreelanceTest\Http\Controllers\Controller;
use FreelanceTest\User;

class UsersController extends Controller
{
    public function index() 
    {
        $search = request('name');
        return User::where('name', 'LIKE', "$search%")
            ->take(5)
            ->pluck('name');
    }
}
