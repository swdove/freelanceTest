<?php

namespace FreelanceTest\Http\Controllers;

use Illuminate\Http\Request;
use FreelanceTest\User;

class ProfilesController extends Controller
{
    public function show(User $user) 
    {
        return view('profiles.show', [
            'profileUser' => $user,
            'threads' => $user->threads()->paginate(20)
        ]);
    }
}
