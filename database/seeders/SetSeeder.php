<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sets')->insert([
                'game_id' => 1,
                'set_number'=>1,
                'my_points' =>25,
                'op_points' =>20,
         ]);
    }
}
