<?php

namespace Database\Seeders;

use App\Models\Headphone;
use Illuminate\Database\Seeder;

class HeadphoneSeeder extends Seeder
{
    public function run(): void
    {
        Headphone::create([
            'name' => 'HD600',
            'idFitType' => 2,
            'idBackType' => 2,
            'idDriverTechnology' => 1,
            'idManufacturer' => 7,
            'releaseYear' => 1997,
            'weight' => 260,
            'impedance' => 300,
            'sensitivity' => 97,
            'sensitivityUnit' => 'dB/mW',
            'driverSize' => '38mm',
            'image' => 'headphones/hd600.png'
        ]);

        Headphone::create([
            'name' => 'HD650',
            'idFitType' => 2,
            'idBackType' => 2,
            'idDriverTechnology' => 1,
            'idManufacturer' => 7,
            'releaseYear' => 2003,
            'weight' => 260,
            'impedance' => 300,
            'sensitivity' => 101,
            'sensitivityUnit' => 'dB/mW',
            'driverSize' => '38mm',
            'image' => 'headphones/hd650.png'
        ]);

        Headphone::create([
            'name' => 'HD660S',
            'idFitType' => 2,
            'idBackType' => 2,
            'idDriverTechnology' => 1,
            'idManufacturer' => 7,
            'releaseYear' => 2017,
            'weight' => 260,
            'impedance' => 150,
            'sensitivity' => 104,
            'sensitivityUnit' => 'dB/mW',
            'driverSize' => '38mm',
            'image' => 'headphones/hd660s.png'
        ]);

        Headphone::create([
            'name' => 'HD800S',
            'idFitType' => 2,
            'idBackType' => 2,
            'idDriverTechnology' => 1,
            'idManufacturer' => 7,
            'releaseYear' => 2016,
            'weight' => 330,
            'impedance' => 300,
            'sensitivity' => 102,
            'sensitivityUnit' => 'dB/mW',
            'driverSize' => '56mm',
            'image' => 'headphones/hd800s.png'
        ]);

        Headphone::create([
            'name' => 'HD560S',
            'idFitType' => 2,
            'idBackType' => 2,
            'idDriverTechnology' => 1,
            'idManufacturer' => 7,
            'releaseYear' => 2020,
            'weight' => 240,
            'impedance' => 120,
            'sensitivity' => 104,
            'sensitivityUnit' => 'dB/mW',
            'driverSize' => '38mm',
            'image' => 'headphones/hd560s.png'
        ]);

        Headphone::create([
            'name' => 'HD599SE',
            'idFitType' => 2,
            'idBackType' => 2,
            'idDriverTechnology' => 1,
            'idManufacturer' => 7,
            'releaseYear' => 2020,
            'weight' => 250,
            'impedance' => 50,
            'sensitivity' => 106,
            'sensitivityUnit' => 'dB/mW',
            'driverSize' => '38mm',
            'image' => 'headphones/hd599se.png'
        ]);

        // Hifiman
        Headphone::create([
            'name' => 'Edition XS',
            'idFitType' => 2,
            'idBackType' => 2,
            'idDriverTechnology' => 2,
            'idManufacturer' => 5,
            'releaseYear' => 2021,
            'weight' => 405,
            'impedance' => 18,
            'sensitivity' => 92,
            'sensitivityUnit' => 'dB',
            'driverSize' => '100x65mm',
            'image' => 'headphones/editionxs.png'
        ]);

        Headphone::create([
            'name' => 'HE400SE',
            'idFitType' => 2,
            'idBackType' => 2,
            'idDriverTechnology' => 2,
            'idManufacturer' => 5,
            'releaseYear' => 2021,
            'weight' => 390,
            'impedance' => 25,
            'sensitivity' => 91,
            'sensitivityUnit' => 'dB/mW',
            'driverSize' => '100mm',
            'image' => 'headphones/he400se.png'
        ]);

        Headphone::create([
            'name' => 'Ananda V1',
            'idFitType' => 2,
            'idBackType' => 2,
            'idDriverTechnology' => 2,
            'idManufacturer' => 5,
            'releaseYear' => 2018,
            'weight' => 399,
            'impedance' => 26,
            'sensitivity' => 93,
            'sensitivityUnit' => 'dB/mW',
            'driverSize' => '80x50mm',
            'image' => 'headphones/anandav1.png'
        ]);

        Headphone::create([
            'name' => 'Ananda V3 Stealth',
            'idFitType' => 2,
            'idBackType' => 2,
            'idDriverTechnology' => 2,
            'idManufacturer' => 5,
            'releaseYear' => 2022,
            'weight' => 398,
            'impedance' => 16,
            'sensitivity' => 93,
            'sensitivityUnit' => 'dB',
            'driverSize' => '80x50mm',
            'image' => 'headphones/anandav3stealth.png'
        ]);
    }
}
