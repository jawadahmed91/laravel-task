<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Jawad Ahmed',
                'email' => 'jawad_ahmed91@yopmail.com',
                'password' => Hash::make('password'), // Replace with the correct password if needed
                'role' => 'admin',
            ],
            [
                'id' => 2,
                'name' => 'Faraz',
                'email' => 'faraz@yopmail.com',
                'password' => Hash::make('password'), // Replace with the correct password if needed
                'role' => 'polio_worker',
            ],
        ]);
    }
}
