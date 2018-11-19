<?php

use Faker\Generator as Faker;

$factory->define(App\Hall::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
