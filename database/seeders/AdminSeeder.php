<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email', 'admin@aritae.com')->first();
        if(!$admin){
            $first_name = "Aritae";
            $last_name = "Admin";
            $email = "admin@aritae.com";
            $password = Hash::make('password');
            $gender = 'male';
            
            $admin = User::create([
                'user_type_id' => 1,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'full_name' => $first_name." ".$last_name,
                'email' => $email,
                'password' => $password,
                'area_of_focus' => 0,
                'gender' => $gender,
            ]);

            $admin_data = Admin::create([
                'user_id' => $admin->id,
                'name' => $first_name." ".$last_name,
                'gender' => $gender
            ]);
        }
    }
}
