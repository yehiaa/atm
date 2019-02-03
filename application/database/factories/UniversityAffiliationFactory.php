<?php

use Faker\Generator as Faker;

$factory->define(App\UniversityAffiliation::class, function (Faker $faker) {
    return [
        'name' => 'University affiliation ' . rand(1, 1000)
    ];
});
