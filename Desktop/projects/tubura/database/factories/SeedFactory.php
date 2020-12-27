<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Seed;
use Faker\Generator as Faker;


$factory->define(Seed::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
