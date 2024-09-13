<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(SetSeeder::class);
        $this->call(PlayerSeeder::class);
        $this->call(ReasonSeeder::class);
    }
}
