<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FertilizerStock;
use Faker\Generator as Faker;
use App\Models\Season;
use App\Models\Cell;
use App\Models\Fertilizer;


$factory->define(FertilizerStock::class, function (Faker $faker) {
    return [
        'season_id' => $faker->randomDigit,
        'initial_amount' => $faker->randomDigit,
        'current_amount' => $faker->randomDigit,
        'fertilizer_id' => $faker->randomDigit,
        'cell_id' => $faker->randomDigit,
        //season BelongsTo Season season_id
        //cell BelongsTo Cell cell_id
        //fertilizer BelongsTo Fertilizer fertilizer_id
    ];
});
