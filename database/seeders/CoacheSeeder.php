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
        $locations = ['Albania', 'Algeria', 'Antigua and Barbuda', 'Australia', 'Austria', 'Bahrain', 'Brazil', 'Canada'];
        $sports = [
            'Aerobics',
            'Archery',
            'Baseball',
            'Basketball',
            'Badminton',
            'Cricket',
            'Curling',
            'Canoeing',
            'Discus Throw',
            'Dodgeball',
            'Equestrianism','Football'
        ];
        $faker = Faker::create();
        foreach ($locations as $key => $value) {
            $s = array_rand($sports);
            DB::table('coaches')->insert([
                'name' => $faker->name,
                'designation' => $faker->jobTitle,
                'rating' => rand(1,5),
                'location' => $value,
                'profile_img' => 'https://api.lorem.space/image/face?w=150&h=150',
                'cover_img' => 'https://api.lorem.space/image/house?w=400&h=200',
                'sport' => $sports[$s],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
