<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chatmodel\Chatcat;
use App\Chatmodel\Chatreport;
use App\User;
use Faker\Generator as Faker;

$factory->define(Chatcat::class, function (Faker $faker) {
    return [

        'id' => $faker->uuid(),
        'user_id' => function() {
            return User::all()->random();
          },
        'chatreport_id' => function() {
            return Chatreport::all()->random();
          },
    ];
});
