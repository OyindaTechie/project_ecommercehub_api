<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(App\User::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,
        // 'email' => $faker->unique()->safeEmail,
        // 'email_verified_at' => now(),
        // 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        // 'remember_token' => $faker->str_random(10),
        'id' => $faker->phoneNumber(),
        // 'username' => $faker->name(),
        // 'meterid' => $faker->unique()->safeEmail,
        'meterid' => $faker->unique()->phoneNumber,
        'balance' => '5000',
        'location' => 'ikoyi Lagos',
        // 'description' => $faker->name(),
        // 'image' => $faker->firstNameMale .'.png',
        // 'gender' => $faker->randomElement(['male', 'female']),

        // 'i' => $faker->numberBetween(1,2),
        'verifyemail' => $faker->numberBetween(1,2),
        'activation_token' => $faker->numberBetween(10000,2000000000),
        'password' => bcrypt('123456'),
        // 'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret



    ];
});
