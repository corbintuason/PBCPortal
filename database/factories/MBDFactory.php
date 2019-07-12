<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\MBD;
use Faker\Generator as Faker;
use App\Agency;

$factory->define(MBD::class, function (Faker $faker) {
$start_date = $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 5 days');
$agencies = Agency::all()->pluck('id')->toArray();   
    return [
        'name' => $faker->words($nb = 3, $asText = true),
        'start_date' => $start_date,
        'end_date' => $faker->dateTimeInInterval($startDate = $start_date, $endDate = '+5 days'),
        'category' => $faker->randomElement(['I', 'II', 'III']),
        'agency_id' => $faker->randomElement($agencies),
    ];
});
