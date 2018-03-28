<?php

namespace FreelanceTest\Http\Controllers;
use FreelanceTest\Models\User;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        //validate
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'         
        ]);

        //create and save user
        $user = User::create([ 
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        
        //sign user in
        auth()->login($user);

        //redirect to home
        return redirect('/');
    }
}
