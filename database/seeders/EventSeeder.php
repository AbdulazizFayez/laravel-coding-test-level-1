<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $insertions = 5;

        for ($i=0; $i < $insertions; $i++) {             
            DB::table('events')->insert([
                'id' => Str::uuid(36),
                'name' => $faker->name,
                'slug' => $faker->unique()->name,
                'startAt' => $faker->dateTime(),
                'endsAt' => $faker->dateTime(),
            ]);
        }    
    }
}
