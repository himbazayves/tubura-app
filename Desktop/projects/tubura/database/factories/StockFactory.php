<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Stock;
use Faker\Generator as Faker;
use App\Models\Season;
use App\Models\Fertilizer;
use App\Models\Seed;


$factory->define(Stock::class, function (Faker $faker) {
    return [
        'season_id' => $faker->randomDigit,
        'initial_amount' => $faker->randomDigit,
        'current_amount' => $faker->randomDigit,
        'seed_id' => $faker->randomDigit,
        'fertilizer_id' => $faker->randomDigit,
        //season BelongsTo Season season_id
        //fertilizer BelongsTo Fertilizer fertilizer_id
        //seed BelongsTo Seed seed_id
    ];
});
