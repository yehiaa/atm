<?php

use Faker\Generator as Faker;

$factory->define(App\Lecture::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'notes' => $faker->paragraph,
        'startDateTime' => $faker->dateTime,
        'endDateTime' => $faker->dateTime,
        'course_id' => $faker->numberBetween(1,10),
    ];
});
