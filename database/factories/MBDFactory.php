<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\MBD;
use Faker\Generator as Faker;
use App\Agency;

$factory->define(MBD::class, function (Faker $faker) {
$agencies = Agency::all()->pluck('id')->toArray();   
    return [
        'name' => $faker->words($nb = 3, $asText = true),
        'agency_id' => $faker->randomElement($agencies),
    ];
});
