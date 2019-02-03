<?php

use Faker\Generator as Faker;

$factory->define(App\ProfessionalData::class, function (Faker $faker) {
    return [
        'name' => 'Professional data ' . rand(1, 1000)
    ];
});
