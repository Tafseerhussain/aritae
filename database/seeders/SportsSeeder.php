<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class SportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
        foreach ($sports as $key => $value) {
            DB::table('sports')->insert([
                'name' => $value,
                'category' => 'sport',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
