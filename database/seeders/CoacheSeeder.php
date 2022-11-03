<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CoacheSeeder extends Seeder
{
    public function run()
    {
        $locations = array('Albania', 'Algeria', 'Antigua and Barbuda', 'Australia', 'Austria', 'Bahrain', 'Brazil', 'Canada');
        $faker = Faker::create();
        for ($i=0; $i < 9; $i++) { 
            DB::table('coaches')->insert([
                'name' => $faker->name,
                'designation' => $faker->jobTitle,
                'rating' => rand(1,5),
                'location' => array_rand($locations),
                'profile_img' => 'https://api.lorem.space/image/face?w=150&h=150',
                'cover_img' => 'https://api.lorem.space/image/house?w=400&h=200',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
