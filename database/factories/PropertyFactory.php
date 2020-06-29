<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\Properties\Property::class, function (Faker $faker) {
    return [
        "name" => $faker->word,
        "value" => $faker->numberBetween(0,30)
    ];
});
