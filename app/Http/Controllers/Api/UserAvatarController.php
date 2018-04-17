<?php

namespace FreelanceTest\Http\Controllers\Api;

use Illuminate\Http\Request;
use FreelanceTest\Http\Controllers\Controller;

class UserAvatarController extends Controller
{
    public function store() 
    {
        $this->validate(request(), [
            'avatar' => ['required', 'image']
        ]);

        $avatar_path = request()->file('avatar')->store('avatars', 'public');

        auth()->user()->update([
            'avatar_path' => $avatar_path
        ]);

        return response([], 204);

        return back();
    }
}
