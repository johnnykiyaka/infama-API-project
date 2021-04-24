<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\clientel;
use Faker\Generator as Faker;

$factory->define(clientel::class, function (Faker $faker) {

    return [
        'movieType' => $faker->word,
        'start' => $faker->word,
        'Ends' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
