<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Season;
use Faker\Generator as Faker;
use App\Models\SeasonType;
use App\Models\Year;


$factory->define(Season::class, function (Faker $faker) {
    return [
        'start' => $faker->text,
        'year_id' => $faker->randomDigit,
        'season_type_id' => $faker->randomDigit,
        'end' => $faker->text,
        //season_type BelongsTo SeasonType season_type_id
        //year BelongsTo Year year_id
    ];
});
