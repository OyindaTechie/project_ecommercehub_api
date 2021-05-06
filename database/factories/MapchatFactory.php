<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chatmodel\Chatcat;
use App\Chatmodel\Mapchat;
use App\User;
use Faker\Generator as Faker;

$factory->define(Mapchat::class, function (Faker $faker) {
    return [

        'id' => function() {
            return  rand();
          },
        'user_id' => function() {
            return User::all()->random();
          },
        'chat' => $faker->text(),
        'chatcat_id' => function() {
            return Chatcat::all()->random();
          },

    ];
});

