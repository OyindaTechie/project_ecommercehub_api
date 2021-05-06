<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meterscase;
use App\User;
use Faker\Generator as Faker;


$factory->define(Meterscase::class, function (Faker $faker) {
    return [


        'id' => $faker->phoneNumber(),
        // 'username' => $faker->name(),
        // 'meterid' => $faker->unique()->safeEmail,
        'user_id'  => function() {
            return User::all()->random();
          },
        'case' => 'bad network',

    ];
});
