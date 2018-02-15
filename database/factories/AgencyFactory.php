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

$factory->define(App\Agency::class,
                 function (Faker $faker) {

    return [
        'name' => $faker->company,
        'description' => $faker->catchPhrase,
        'address' => $faker->address,
        'gmaps_url' => $faker->url,
        'contact_phone' => $faker->e164PhoneNumber,
        'fb_url' => $faker->url,
        'website_url' => $faker->url,
        'logo_path' => 'agencies/logos/' . $faker->image('public/storage/agencies/logos', 150, 150, null, false),
        'doe' => $faker->date(),
    ];
});
