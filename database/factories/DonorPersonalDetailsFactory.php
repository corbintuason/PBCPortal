<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\DonorPersonalDetails;
use Faker\Generator as Faker;

$factory->define(DonorPersonalDetails::class, function (Faker $faker) {
    return [
            'sex' => $faker->randomElement(['Male', 'Female']),
            'civil_status' => $faker->randomElement(['Single', 'Married', 'Separated', 'Widowed', 'Divorced']),
            'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'contact_number' => $faker->numerify('###########'),
            'occupation' => $faker->jobTitle,
            'nationality' => $faker->randomElement(['American', 'Filipino', 'Chinese', 'Korean'])
    ];
});
