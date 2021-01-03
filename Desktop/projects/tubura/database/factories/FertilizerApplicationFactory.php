<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FertilizerApplication;
use Faker\Generator as Faker;
use App\Models\FertilizerRequest;


$factory->define(FertilizerApplication::class, function (Faker $faker) {
    return [
        'season_id' => $faker->randomDigit,
        'open' => $faker->optional()->boolean,
        //fertilizer_requests HasMany FertilizerRequest id
    ];
});
