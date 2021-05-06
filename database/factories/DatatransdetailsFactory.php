<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Datatransdetails;
use App\Model;
use App\Transactiontype;
use App\User;
use Faker\Generator as Faker;


$factory->define(Datatransdetails::class, function (Faker $faker) {
    return [

                   // mobileNumber
                   'id' => $faker->unique()->randomNumber($nbDigits = 9, $strict = true),
                   'network' => 'glo',
                   'phone' => function() {
                    return User::all()->random();
                  },
                  'plan' => '1GB',
                   'user_id' => function() {
                       return User::all()->random();
                     },
                     'transactiontype_id' => function() {
                       return Transactiontype::all()->random();
                   },
                   'isactive' => true,

    ];
});
