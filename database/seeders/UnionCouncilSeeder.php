<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnionCouncilSeeder extends Seeder
{
    public function run()
    {
        DB::table('union_councils')->insert([
            [
                'id' => 1,
                'name' => 'UC-136',
                'tehsil_id' => 1,
            ],
        ]);
    }
}
