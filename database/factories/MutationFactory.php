<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Properties\Mutation::class, function (Faker $faker) {
    return [
        "name" => $faker->unique()->word,
        "value" => sprintf("floor((%s-10)/2)", $faker->numberBetween(0,36))
    ];
});
