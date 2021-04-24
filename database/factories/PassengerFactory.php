<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Passenger;
use Faker\Generator as Faker;

$factory->define(Passenger::class, function (Faker $faker) {

    return [
        'movie' => $faker->word,
        'start' => $faker->word,
        'landing' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
