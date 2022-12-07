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
        $fake = Faker::create();
        $insertions = 5;
        
        foreach ($insertions as $insert) {            
            DB::table('events')->insert([
                'name' => $faker->name,
                'slug' => $faker->unique()->name,
                'startAt' => $faker->dateTime(),
                'endsAt' => $faker->dateTime(),
            ]);
        }    
    }
}
