<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SeasonType;
use Faker\Generator as Faker;
use App\Models\Season;


$factory->define(SeasonType::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        //seasons HasMany Season id
    ];
});
