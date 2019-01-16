<?php

use Faker\Generator as Faker;

$factory->define(App\Trainer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'identity' => $faker->uuid,
        'identity_type' => $faker->randomElement(['passport','national']),
        'country' => $faker->country,
        'city' => $faker->city,
        'speciality_id' => $faker->numberBetween(1,10)
    ];
});



