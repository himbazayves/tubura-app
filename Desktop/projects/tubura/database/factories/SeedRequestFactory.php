<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SeedRequest;
use Faker\Generator as Faker;
use App\Models\Season;
use App\Models\Farmer;
use App\Models\Seed;


$factory->define(SeedRequest::class, function (Faker $faker) {
    return [
        'farmer_id' => $faker->randomDigit,
        'season_id' => $faker->randomDigit,
        'seed_id' => $faker->randomDigit,
        'requested_amount' => $faker->text,
        'given_amount' => $faker->text,
        'approved' => $faker->optional()->boolean,
        'received' => $faker->optional()->boolean,
        //season BelongsTo Season season_id
        //farmer BelongsTo Farmer farmer_id
        //seed BelongsTo Seed seed_id
    ];
});
