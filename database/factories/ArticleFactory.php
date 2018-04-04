<?php

use Faker\Generator as Faker;

$factory->define(FreelanceTest\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'body' => $faker->text(200)
    ];
});
