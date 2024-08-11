<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TehsilSeeder extends Seeder
{
    public function run()
    {
        DB::table('tehsils')->insert([
            [
                'id' => 1,
                'name' => 'Latifabad # 10',
                'district_id' => 1,
            ],
        ]);
    }
}

