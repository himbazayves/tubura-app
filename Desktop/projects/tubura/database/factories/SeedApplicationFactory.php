<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SeedApplication;
use Faker\Generator as Faker;
use App\Models\SeedRequest;


$factory->define(SeedApplication::class, function (Faker $faker) {
    return [
        'season_id' => $faker->randomDigit,
        'open' => $faker->optional()->boolean,
        //seed_requests HasMany SeedRequest id
    ];
});
