<?php

namespace FreelanceTest;

class Reply extends Model
{
    use Favoritable;
    protected $with = ['owner', 'favorites'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
