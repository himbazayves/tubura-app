<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SeasonType;
use Faker\Generator as Faker;
use App\Models\Season;


$factory->define(SeasonType::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'start' => $faker->text,
        'end' => $faker->text,
        //seasons HasMany Season id
    ];
});
