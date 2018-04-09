<?php

namespace FreelanceTest;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }    

    public function publish($post)
    {
        $this->posts()->save($post);
    }

    public function comment($comment)
    {
        $this->comments()->save($comment);
    }

    public function reply($reply)
    {
        $this->replies()->save($reply);
    }
    public function getRouteKeyName()
    {
        return 'name';
    }
    public function threads()
    {
        return $this->hasMany(Thread::class)->latest();
    }
}
