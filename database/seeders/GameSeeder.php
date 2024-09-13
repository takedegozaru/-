<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('games')->insert([
            'user_id'=>1,
            'school_id'=>1,
            'name'=>'新人戦1回戦',
            'my_score'=>2,
            'op_score'=>1,
            'date'=>date('2024-09-10'),
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            ]) ;  
    }
}
