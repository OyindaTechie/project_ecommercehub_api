<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chatmodel\Chatcat;
use App\Chatmodel\Chatreport;
use App\User;
use Faker\Generator as Faker;

$factory->define(Chatreport::class, function (Faker $faker) {
    return [

        'id' => function() {
            return rand();
          },
          'imageid' => function() {
            return rand(1,30);
          },
        'user_id' => function() {
            return User::all()->random();
          },
          'chatcat_id' => function() {
            return rand();
          },
        'location' => $faker->paragraph(),
        'description' => $faker->text(),
    ];
});
