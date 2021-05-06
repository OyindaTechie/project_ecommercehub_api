<?php

use App\Airtimetransdetails;
use App\Datatransdetails;
use App\Meterscase;
use App\Transaction;
use App\Transactiontype;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(User::class, 3)->create();
        // factory(Transactiontype::class, 3)->create();
        // factory(Datatransdetails::class, 5)->create();
        // factory(Airtimetransdetails::class, 5)->create();
        factory(Meterscase::class, 10)->create();
        // factory(Score::class, 3)->create();

    }
}
