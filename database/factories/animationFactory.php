<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\animation;
use Faker\Generator as Faker;

$factory->define(animation::class, function (Faker $faker) {

    return [
        'type' => $faker->word,
        'starts' => $faker->word,
        'ends' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
