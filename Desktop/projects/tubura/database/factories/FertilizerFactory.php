<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Fertilizer;
use Faker\Generator as Faker;


$factory->define(Fertilizer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
