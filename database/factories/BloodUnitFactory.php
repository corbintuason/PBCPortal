<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\User;
use App\BloodUnit;

$factory->define(BloodUnit::class, function (Faker $faker) {
    $donors = User::all()->pluck('id')->toArray();
    $code = $faker->numerify('NVBSP###########');
    // $status = $faker->randomElement(['Donated', 'Typed', 'Processed', 'Tested','Stock']);

    return [
        'code' => $code,
        'status' => "Donated",
    ];
});
