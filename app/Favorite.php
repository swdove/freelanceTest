<?php

namespace FreelanceTest;

class Favorite extends Model
{
    use RecordsActivity;

    public function favorited()
    {
        return $this->morphTo();
    }
}
