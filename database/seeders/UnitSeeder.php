<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // hd600
        Unit::create([
            'idHeadphone' => 1,
            'owner' => 'Wypożyczalnia',
            'price' => 130
        ]);
        // edition xs
        Unit::create([
            'idHeadphone' => 7,
            'owner' => 'Wypożyczalnia',
            'price' => 180
        ]);
        // hd560s
        Unit::create([
            'idHeadphone' => 5,
            'owner' => 'Wypożyczalnia',
            'price' => 70
        ]);
        // hd599se
        Unit::create([
            'idHeadphone' => 6,
            'owner' => 'Wypożyczalnia',
            'price' => 50
        ]);
        // hd650
        Unit::create([
            'idHeadphone' => 2,
            'owner' => 'Wypożyczalnia',
            'price' => 140
        ]);
        // hd800s
        Unit::create([
            'idHeadphone' => 4,
            'owner' => 'Wypożyczalnia',
            'price' => 300
        ]);
        // hd660s
        Unit::create([
            'idHeadphone' => 3,
            'owner' => 'Wypożyczalnia',
            'price' => 160
        ]);
        // ananda v3 stealth
        Unit::create([
            'idHeadphone' => 10,
            'owner' => 'Wypożyczalnia',
            'price' => 210
        ]);
        // he400se
        Unit::create([
            'idHeadphone' => 8,
            'owner' => 'Wypożyczalnia',
            'price' => 60
        ]);
    }
}
