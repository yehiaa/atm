<?php

use Faker\Generator as Faker;

$factory->define(App\Hall::class, function (Faker $faker) {
    return [
        'name' => 'Hall name ' . rand(1, 1000)
    ];
});
