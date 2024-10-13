<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reason_datas=[
            [
                'name'=>'スパイク',
            ],
            [
                'name'=>'ブロック',
            ],
            [
                'name'=>'サービスエース',
            ],
            [   
                'name'=>'フェイント',
            ],
            [
                'name'=>'ツーアタック'
            ],
            [
                'name'=>'相手ミス'
            ]
        ];
        foreach ($reason_datas as $data){
            DB::table('reasons')->insert($data);
        }
    }
}
