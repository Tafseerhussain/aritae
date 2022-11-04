<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    public function run()
    {
        $locations = [
            'Albania',
            'Algeria',
            'Antigua and Barbuda',
            'Australia',
            'Austria',
            'Bahrain',
            'Brazil',
            'Brazil',
            'Denmark',
            'France',
            'Greece','Hawaii'
        ];
        foreach ($locations as $key => $value) {
            DB::table('locations')->insert([
                'location' => $value,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
