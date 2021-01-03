<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FertilizerRequest;
use Faker\Generator as Faker;
use App\Models\FertilizerRequest;
use App\Models\Farmer;
use App\Models\Fertilizer;


$factory->define(FertilizerRequest::class, function (Faker $faker) {
    return [
        'farmer_id' => $faker->randomDigit,
        'fertilizer_id' => $faker->randomDigit,
        'requested_amount' => $faker->text,
        'given_amount' => $faker->optional()->text,
        'approved' => $faker->optional()->boolean,
        'received' => $faker->optional()->boolean,
        'fertilizer_application_id' => $faker->randomDigit,
        //fertilizer_requests BelongsTo FertilizerRequest fertilizer_requests_id
        //farmer BelongsTo Farmer farmer_id
        //fertilizer BelongsTo Fertilizer fertilizer_id
    ];
});
