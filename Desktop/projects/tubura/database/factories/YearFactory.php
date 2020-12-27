<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Year;
use Faker\Generator as Faker;
use App\Models\Season;


$factory->define(Year::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        //seasons HasMany Season id
    ];
});
