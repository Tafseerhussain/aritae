<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\UserType;

class UserTypeSeeder extends Seeder
{
    public function run()
    {
        $type = ['admin', 'coach', 'parent', 'player'];
        $power = [99,1,1,1];

        foreach ($type as $key => $value) {
            DB::table('user_types')->insert([
                'type' => $value,
                'power' => $power[$key],
            ]);
        }
    }
}
