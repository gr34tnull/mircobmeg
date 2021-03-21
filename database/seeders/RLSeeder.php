<?php

namespace Database\Seeders;

use App\Models\RegionalLocation;
use Illuminate\Database\Seeder;

class RLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegionalLocation::create([
            'name' => 'MANILA',
        ]);

        RegionalLocation::create([
            'name' => 'BAGUIO',
        ]);

        RegionalLocation::create([
            'name' => 'CEBU',
        ]);
    }
}
