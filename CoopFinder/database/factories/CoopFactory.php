<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coop;
use Faker\Generator as Faker;

$factory->define(Coop::class, function (Faker $faker) {
    return [
            'coop_name' => $faker->text($maxNbChars = 50),
            'owner_id' => App\User::all()->random()->id,
            'verified_status' => $faker->boolean($chanceOfGettingTrue = 50),
            'coop_ref_num' => $faker->bothify('??####'),
            'est_date' => $faker->date($format = 'Y-m-d', $startDate='-10years', $endDate='now'),
            'coop_address' => $faker->address,
            'coop_city' => $faker->city,
            'coop_postcode' => $faker->postcode,
            'coop_state' => $faker->randomElement($array = array ('Selangor','Kuala Lumpur','Negeri Sembilan')),
            'coop_telephone' => $faker->numerify('##########'),
            'coop_fax' => $faker->numerify('##########'),
            'email' => $faker->unique()->safeEmail,
            'business_type' => $faker->randomElement($array = array ('Banking','Agriculture','Consumer')), 
    ];
});
