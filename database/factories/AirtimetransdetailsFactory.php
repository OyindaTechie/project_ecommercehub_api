<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Airtimetransdetails;
use App\Model;
use App\Transactiontype;
use App\User;
use Faker\Generator as Faker;


$factory->define(Airtimetransdetails::class, function (Faker $faker) {
    return [

               // mobileNumber
               'id' => $faker->unique()->randomNumber($nbDigits = 9, $strict = true),
               'network' => 'mtn',
               'phone' => function() {
                return User::all()->random();
              },
              'amount' => '700',
               'user_id' => function() {
                   return User::all()->random();
                 },
                 'transactiontype_id' => function() {
                   return Transactiontype::all()->random();
                 },
               'isactive' => true,

    ];
});
