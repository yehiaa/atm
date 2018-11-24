<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'alternative_name' => $faker->name,
        'description' => $faker->paragraph,
        'start_datetime' => $faker->dateTime,
        'end_datetime' => $faker->dateTime
    ];
});
