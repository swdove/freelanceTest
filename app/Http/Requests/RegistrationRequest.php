<?php

namespace FreelanceTest\Http\Requests;

use FreelanceTest\User;
use FreelanceTest\Mail\PleaseConfirmYourEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'   
        ];
    }

    public function persist() 
    {
        //create and save user
        // $user = User::create(
        //     $this->only(['name', 'email', 'password'])
        // );

       // dd($this);

        $user = User::forceCreate([
            'name' => $this['name'],
            'email' => $this['email'],
            'password' => Hash::make($this['password']),
            'confirmation_token' => str_limit(md5($this['email'] . str_random()), 25, '')
        ]);        
        
        //sign user in
        auth()->login($user);

        //send welcome email
        Mail::to($user)->send(new PleaseConfirmYourEmail($user));        
    }
}
