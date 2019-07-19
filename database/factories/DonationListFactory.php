<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\DonationList;
use Faker\Generator as Faker;

$factory->define(DonationList::class, function (Faker $faker) {
    $donations = App\Donation::pluck('id')->toArray();

    return[
        'donation_id' => $faker->randomElement($donations),
        // 'donation_date' => 
    ];
});
