<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        DB::table('districts')->insert([
            [
                'id' => 1,
                'name' => 'Latifabad',
                'division_id' => 2,
            ],
            [
                'id' => 2,
                'name' => 'Qasimabad',
                'division_id' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Old City',
                'division_id' => 2,
            ],
        ]);
    }
}
