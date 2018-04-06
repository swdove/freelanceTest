<?php

use Faker\Generator as Faker;

$factory->define(FreelanceTest\Reply::class, function (Faker $faker) {
    return [
        'thread_id' => function () {
            return factory(FreelanceTest\Thread::class)->create()->id;
        },        
        'user_id' => function () {
            return factory(FreelanceTest\User::class)->create()->id;
        },
        'body' => $faker->paragraph
    ];
});