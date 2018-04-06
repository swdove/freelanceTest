<?php

namespace FreelanceTest;

class Channel extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';

    }
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}
