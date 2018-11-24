<?php

use Faker\Generator as Faker;

$factory->define(App\Nomination::class, function (Faker $faker) {
    return [
        'name' => 'Nomination ' . rand(1, 1000)
    ];
});
