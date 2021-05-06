<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Airtimetransdetails;
use App\Transaction;
use App\Transactiontype;
use App\User;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        // mobileNumber
        'id' => $faker->unique()->randomNumber($nbDigits = 9, $strict = true),
        'user_id' => function() {
            return User::all()->random();
          },
        'price' => '500',
        'transactiontype_id' => function() {
            return Transactiontype::all()->random();
          },
          'transactiondetails' => function() {
            return Airtimetransdetails::all()->random();
          },
        'status' => true,
        'isactive' => true,
    ];
});
