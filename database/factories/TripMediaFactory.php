<?php

use Faker\Generator as Faker;

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

$factory->define(App\TripMedia::class,
                 function (Faker $faker) {
    $image = $faker->image('public/storage/trips/media', 400, 300, null, false);
    return [
        'name' => $image,
        'path' => 'storage/trips/media/' . $image,
        'type' => 'jpg'
    ];
});
