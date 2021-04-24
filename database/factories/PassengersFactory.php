<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Passengers;
use Faker\Generator as Faker;

$factory->define(Passengers::class, function (Faker $faker) {

    return [
        'movie' => $faker->word,
        'movielength' => $faker->word,
        'arrival' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
