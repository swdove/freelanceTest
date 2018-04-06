<?php

use Faker\Generator as Faker;

$factory->define(FreelanceTest\Thread::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(FreelanceTest\User::class)->create()->id;
        },
        'channel_id' => function () {
            return factory(FreelanceTest\Channel::class)->create()->id;
        },
        'title' => $faker->sentence,
        'body' => $faker->paragraph
    ];
});
