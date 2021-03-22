<?php

namespace Database\Seeders;

use App\Models\NationalBloodline;
use App\Models\NationalImage;
use Illuminate\Database\Seeder;

class BloodlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NationalBloodline::create([
            'national_id' => '9',
            'title' => 'BLACK',
            'description' => 'This is the BLACK Bloodline',
        ]);

        NationalBloodline::create([
            'national_id' => '9',
            'title' => 'DIRTY GREY',
            'description' => 'This is the Dirty Grey Bloodline',
        ]);

        NationalBloodline::create([
            'national_id' => '9',
            'title' => 'Gilmore Hatch',
            'description' => 'This is the Gilmore Hatch Bloodline',
        ]);

        NationalImage::create([
            'bloodline_id' => '1',
            'image' => 'black.jpg',
        ]);

        NationalImage::create([
            'bloodline_id' => '2',
            'image' => 'dirtygrey.jpg',
        ]);

        NationalImage::create([
            'bloodline_id' => '3',
            'image' => 'gilmorehatch1.jpg',
        ]);

        NationalImage::create([
            'bloodline_id' => '3',
            'image' => 'gilmorehatch2.jpg',
        ]);
    }
}
