<?php

use Faker\Generator as Faker;
use App\Entities\TripTypes;

/*
  |--------------------------------------------------------------------------
  | Model Factories
  |--------------------------------------------------------------------------
  |
  | This directory should contain each of the model factory definitions for
  | your application. Factories provide a convenient way to generate new
  | model instances for testing / seeding your application's database.
  |
 */

$factory->define(App\Trip::class,
                 function (Faker $faker) {
    $startDate = $faker->date('Y-m-d');
    return [
        'name' => $faker->company,
        'description' => $faker->catchPhrase,
        'start_date' => $startDate,
        'end_date' => $faker->dateTimeBetween($startDate, '+ 30 days'),
        'type' => $faker->randomElement(TripTypes::all()),
        'extra_details' => $faker->text,
        'price_per_person' => $faker->numberBetween(6000, 15000),
        'currency' => $faker->currencyCode,
        'deadline_date' => $faker->date('Y-m-d', $startDate),
        'external' => $faker->boolean
    ];
});
