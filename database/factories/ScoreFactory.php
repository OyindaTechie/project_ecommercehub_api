<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chatmodel\Chatgroup;
use App\Chatmodel\Score;
use Faker\Generator as Faker;

$factory->define(Score::class, function (Faker $faker) {
    return [

        'id' => function() {
            return  rand();
          },
        'game' => $faker->randomDigit(),
        'myscore' => $faker->randomDigit(),
        'yourscore' => $faker->randomDigit(),
        'chatgroup_id' => function() {
            return Chatgroup::all()->random();
          },
    ];
});
