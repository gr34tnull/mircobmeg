<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(NationalSeeder::class);
        $this->call(NationalAchievementSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(RLSeeder::class);
        $this->call(BloodlineSeeder::class);
    }
}
