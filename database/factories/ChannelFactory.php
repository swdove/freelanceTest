<?php

use Faker\Generator as Faker;

$factory->define(FreelanceTest\Channel::class, function (Faker $faker) {
    $name = $faker->word;

    return [
        'name' => $name,
        'slug' => $name
    ];
});