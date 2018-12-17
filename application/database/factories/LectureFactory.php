<?php

use Faker\Generator as Faker;

$factory->define(App\Lecture::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'notes' => $faker->paragraph,
        'start_datetime' => $faker->dateTime,
        'end_datetime' => $faker->dateTime,
        'course_id' => $faker->numberBetween(1,10),
    ];
});
