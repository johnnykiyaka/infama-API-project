<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Passter;
use Faker\Generator as Faker;

$factory->define(Passter::class, function (Faker $faker) {

    return [
        'name' => $faker->text,
        'type' => $faker->word,
        'created_by' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
