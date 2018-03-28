<?php

namespace FreelanceTest\Http\Requests;

use FreelanceTest\User;
use FreelanceTest\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

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
            'email' => 'required|email',
            'password' => 'required|confirmed'   
        ];
    }

    public function persist() 
    {
        //create and save user
        $user = User::create(
            $this->only(['name', 'email', 'password'])
        );
        
        //sign user in
        auth()->login($user);

        //send welcome email
        Mail::to($user)->send(new Welcome($user));        
    }
}
