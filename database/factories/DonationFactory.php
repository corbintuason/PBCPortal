<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Donation;
use Faker\Generator as Faker;

$factory->define(Donation::class, function (Faker $faker) {
    $donors = App\User::pluck('id')->toArray();
    $status = $faker->randomElement(['Pass', 'Fail']);
    return [
        'donor_id' => $faker->randomElement($donors),
        'status' => $status
    ];
});
