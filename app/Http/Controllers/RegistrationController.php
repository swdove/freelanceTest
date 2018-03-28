<?php

namespace FreelanceTest\Http\Controllers;
use Illuminate\Http\Request;
use FreelanceTest\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {
        $request->persist();
        //redirect to home
        return redirect('/');
    }
}
