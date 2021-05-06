<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chatmodel\Chatgroup;
use Faker\Generator as Faker;

$factory->define(Chatgroup::class, function (Faker $faker) {
    return [

        'id' => function() {
            return  rand();
          },
        'image' => $faker->domainName()


    ];
});
