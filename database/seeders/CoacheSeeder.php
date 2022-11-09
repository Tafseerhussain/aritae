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
        $covers = [
            'assets/img/sports/badminton.jpg',
            'assets/img/sports/aerobics.jpg',
            'assets/img/sports/basketball.jpg',
            'assets/img/sports/cricket.jpg',
            'assets/img/sports/football.jpg',
            'assets/img/sports/swimming.jpg',
            'assets/img/sports/baseball.jpg',
            'assets/img/sports/eq.jpg',
        ];
        $players = [
            'assets/img/players/1.jpg',
            'assets/img/players/2.jpeg',
            'assets/img/players/3.jpeg',
            'assets/img/players/4.jpeg',
            'assets/img/players/5.jpeg',
            'assets/img/players/6.jpeg',
            'assets/img/players/7.jpeg',
            'assets/img/players/8.jpeg',
        ];
        $faker = Faker::create();
        foreach ($locations as $key => $value) {
            $s = array_rand($sports);
            $g = array_rand($gender);
            $e = array_rand($experience);
            $r = array_rand($rate);

            $fName = $faker->firstName;
            $lName = $faker->lastName;
            $jobTitle = $faker->jobTitle;

            $userId = DB::table('users')->insertGetId([
                'user_type_id' => 2,
                'first_name' => $fName,
                'last_name' => $lName,
                'full_name' => $fName.' '.$lName,
                'email' => $faker->unique()->email,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'area_of_focus' => $jobTitle,
                'gender' => $gender[$g],
                'experience' => $experience[$e],
                'hourly_rate' => $rate[$r],
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('coaches')->insert([
                'user_id' => $userId,
                'name' => $fName.' '.$lName,
                'designation' => $jobTitle,
                'rating' => rand(1,5),
                'location' => $value,
                'profile_img' => $players[$key],
                'cover_img' => $covers[$key],
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
