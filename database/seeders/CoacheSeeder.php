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
        $gender = ['male', 'female'];
        $experience = [1,3,2,4,5,6,3,2,4,5];
        $rate = [20, 30, 40, 50, 60, 70, 80, 100, 10];
        $sports = [
            'Aerobics', 'Archery',
            'Baseball', 'Basketball',
            'Badminton', 'Cricket',
            'Curling', 'Canoeing',
            'Discus Throw', 'Dodgeball',
            'Equestrianism','Football'
        ];
        $faker = Faker::create();
        foreach ($locations as $key => $value) {
            $s = array_rand($sports);
            $g = array_rand($gender);
            $e = array_rand($experience);
            $r = array_rand($rate);
            DB::table('coaches')->insert([
                'name' => $faker->name,
                'designation' => $faker->jobTitle,
                'rating' => rand(1,5),
                'location' => $value,
                'profile_img' => 'https://api.lorem.space/image/face?w=150&h=150',
                'cover_img' => 'https://api.lorem.space/image/house?w=400&h=200',
                'sport' => $sports[$s],
                'gender' => $gender[$g],
                'experience' => $experience[$e],
                'hourly_rate' => $rate[$r],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
