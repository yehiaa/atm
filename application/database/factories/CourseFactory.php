<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'alternative_name' => $faker->name,
        'description' => $faker->paragraph,
        'startDateTime' => $faker->dateTime,
        'endDateTime' => $faker->dateTime
    ];
});
