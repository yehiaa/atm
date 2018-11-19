<?php

use Faker\Generator as Faker;

$factory->define(App\Trainee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'phone' => $faker->phoneNumber,
        'country' => $faker->country,
        'city' => $faker->city,
        'identity' => $faker->uuid,
        'identity_type' => $faker->randomElement(['passport', 'national']),
    ];
});