<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Season;
use Faker\Generator as Faker;
use App\Models\SeasonType;
use App\Models\Year;


$factory->define(Season::class, function (Faker $faker) {
    return [
        'year_id' => $faker->randomDigit,
        'season_type_id' => $faker->randomDigit,
        //season_type BelongsTo SeasonType season_type_id
        //year BelongsTo Year year_id
    ];
});
