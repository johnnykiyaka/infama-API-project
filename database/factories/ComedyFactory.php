<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comedy;
use Faker\Generator as Faker;

$factory->define(Comedy::class, function (Faker $faker) {

    return [
        'comedies' => $faker->word,
        'comedysStart' => $faker->word,
        'comedysEnd' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
