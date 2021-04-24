<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\customer;
use Faker\Generator as Faker;

$factory->define(customer::class, function (Faker $faker) {

    return [
        'movie' => $faker->word,
        'movielength' => $faker->word,
        'arrival' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
