<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\Team;
use App\Models\Team;
use App\Models\Team;


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'surname' => $faker->optional()->name,
        'phone_number' => $faker->optional()->phoneNumber,
        'cell_id' => $faker->optional()->randomDigit,
        'is_admin' => $faker->boolean,
        'email' => $faker->safeEmail,
        'email_verified_at' => $faker->optional()->dateTime(),
        'password' => $faker->bcrypt($faker->password),
        'two_factor_secret' => $faker->optional()->text(1024),
        'two_factor_recovery_codes' => $faker->optional()->text(1024),
        'remember_token' => $faker->optional()->md5,
        'current_team_id' => factory(CurrentTeam::class),
        'profile_photo_path' => $faker->optional()->text(1024),
        //tokens MorphMany PersonalAccessToken id
        //currentTeam BelongsTo Team current_team_id
        //ownedTeams HasMany Team id
        //teams BelongsToMany Team 
    ];
});
