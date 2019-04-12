<?php

use Illuminate\Database\Seeder;
use App\Eotime;

class EoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Let's truncate our existing records to start from scratch.
        Eotime::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Eotime::create([
                'title' => $faker->sentence,
                'date' => $faker->date,
                'days' => $faker->randomDigit,
            ]);
        }
    }
}
