<?php

use Faker\Generator as Faker;

$factory->define(App\Affiliation::class, function (Faker $faker) {
    return [
        'name' => 'Affiliation ' . rand(1, 1000)
    ];
});
