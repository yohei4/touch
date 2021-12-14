<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'restaurant_id' => 1,
        'id' => 1,
        'name' => '高林遥平',
        'email' => 'yohei200421@gmail.com',
        'email_verified_at' => now(),
        'password' => Hash::make('120421you'), // password
        'remember_token' => Str::random(10),
    ];
});
