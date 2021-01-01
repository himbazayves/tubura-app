<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FertilizerRequest;
use Faker\Generator as Faker;
use App\Models\Season;
use App\Models\Farmer;
use App\Models\Fertilizer;


$factory->define(FertilizerRequest::class, function (Faker $faker) {
    return [
        'season_id' => $faker->randomDigit,
        'farmer_id' => $faker->randomDigit,
        'fertilizer_id' => $faker->randomDigit,
        'requested_amount' => $faker->text,
        'given_amount' => $faker->text,
        'approved' => $faker->optional()->boolean,
        'received' => $faker->optional()->boolean,
        //season BelongsTo Season season_id
        //farmer BelongsTo Farmer farmer_id
        //fertilizer BelongsTo Fertilizer fertilizer_id
    ];
});
