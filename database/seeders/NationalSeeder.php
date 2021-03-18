<?php

namespace Database\Seeders;

use App\Models\National;
use Illuminate\Database\Seeder;

class NationalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        National::create([
            'fname' => 'Adrian',
            'lname' => 'Manalansan',
            'farm' => 'Tokwing Gamefarm',
            'location' => 'Lubao, Pampanga',
            'image' => '1_adrian_manalansan.png',
            'fb' => 'https://www.facebook.com/profile.php?id=100009259434877',
        ]);

        National::create([
            'fname' => 'James & Charles',
            'lname' => 'Wolf',
            'farm' => 'ISES Gamefarm',
            'location' => 'Balanga, Bataan',
            'image' => '2_james_and_charles_wolf.png',
            'fb' => 'https://www.facebook.com/Ises-gamefarm-903609189650409',
        ]);

        National::create([
            'fname' => 'John Lester',
            'lname' => 'Lee',
            'farm' => 'Gemini Denha Gamefarm',
            'location' => 'Cabuyao, Laguna',
            'image' => '3_john_lester_lee.png',
        ]);

        National::create([
            'fname' => 'Marlon',
            'lname' => 'Escolin',
            'farm' => 'San Francisco Gamefarm',
            'location' => 'Roxas, Capiz',
            'image' => '4_marlon_escoline.png',
        ]);

        National::create([
            'fname' => 'Martin',
            'lname' => 'Escolin',
            'farm' => 'Green Country Gamefarm',
            'location' => 'Roxas, Capiz',
            'image' => '5_martin_escolin.png',
        ]);

        National::create([
            'fname' => 'Alfonso',
            'lname' => 'Garcia',
            'farm' => 'Al Gar Gamefarm',
            'location' => 'Bacolod City',
            'image' => '6_alfonso_garcia.png',
        ]);

        National::create([
            'fname' => 'Giovanni',
            'lname' => 'Ong',
            'farm' => 'First Love Gamefarm',
            'location' => 'Cebu City',
            'image' => '7_giovanni_ong.png',
        ]);

        National::create([
            'fname' => 'James',
            'lname' => 'Fuentes',
            'farm' => 'JF Anarchy 99 Gamefarm',
            'location' => 'Davao City',
            'image' => '8_james_fuentes.png',
            'fb' => 'https://www.facebook.com/Ises-gamefarm-903609189650409',
        ]);

        National::create([
            'fname' => 'Jeck-Jeck',
            'lname' => 'Sabadisto',
            'farm' => 'Ysay Gamefarm',
            'location' => 'Maigo, Lanao del Norte',
            'image' => '9_jeck_sabadisto.png',
            'fb' => 'https://www.facebook.com/jecksabadisto',
        ]);
    }
}
