<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\TypedBloodUnit::class, function (Faker $faker) {
    return [
        'ABO' => $faker->randomElement(['A', 'B', 'AB', 'O']),
        'rh_type'=> $faker->randomElement(['+', '-'])
    ];
});
