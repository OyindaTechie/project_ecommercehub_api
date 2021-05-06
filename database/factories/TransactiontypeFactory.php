<?php
use App\Model;
use App\Transactiontype;
use Faker\Generator as Faker;

$factory->define(Transactiontype::class, function (Faker $faker) {
    return [

        'type' => 'airtime',
        'isactive' => true,

    ];
});
