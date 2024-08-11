<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    public function run()
    {
        DB::table('divisions')->insert([
            [
                'id' => 1,
                'name' => 'Karachi',
                'province_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Hyderabad Sindh',
                'province_id' => 1,
            ],
        ]);
    }
}

