<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Schemas\Sheet::class, function (Faker $faker) {
    return [
        "name" => $faker->name
    ];
});
