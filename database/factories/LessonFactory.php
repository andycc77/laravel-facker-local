<?php

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'intro' => $faker->paragraph,
        'image' => $faker->imageUrl(),
        'published_at' => $faker->dateTime
    ];
});
