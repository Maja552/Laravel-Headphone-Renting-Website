<?php

namespace Database\Seeders;

use App\Models\Backtype;
use App\Models\Drivertechnology;
use App\Models\Fittype;
use App\Models\Manufacturer;
use App\Models\Rentstatus;
use Illuminate\Database\Seeder;

class DictionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Manufacturers
        Manufacturer::create(['name' => 'AKG']);
        Manufacturer::create(['name' => 'Audio-Technica']);
        Manufacturer::create(['name' => 'Audeze']);
        Manufacturer::create(['name' => 'Beyerdynamic']);
        Manufacturer::create(['name' => 'Hifiman']);
        Manufacturer::create(['name' => 'Meze']);
        Manufacturer::create(['name' => 'Sennheiser']);
        Manufacturer::create(['name' => 'Philips']);
        Manufacturer::create(['name' => 'HarmonicDyne']);
        Manufacturer::create(['name' => 'Fostex']);
        Manufacturer::create(['name' => 'Focal']);
        Manufacturer::create(['name' => 'Monoprice']);
        Manufacturer::create(['name' => 'Shure']);
        Manufacturer::create(['name' => 'Superlux']);
        Manufacturer::create(['name' => 'Koss']);
        Manufacturer::create(['name' => 'SPC Gear']);
        Manufacturer::create(['name' => 'JVC']);
        Manufacturer::create(['name' => 'HyperX']);
        Manufacturer::create(['name' => 'ISK']);
        Manufacturer::create(['name' => 'Kiwi Ears']);
        Manufacturer::create(['name' => 'QKZ']);
        Manufacturer::create(['name' => 'T+A']);
        Manufacturer::create(['name' => 'Dan Clark Audio']);
        Manufacturer::create(['name' => 'Fiio']);
        Manufacturer::create(['name' => 'Rode']);
        Manufacturer::create(['name' => 'Denon']);
        Manufacturer::create(['name' => 'Grado']);
        Manufacturer::create(['name' => 'Steelseries']);
        Manufacturer::create(['name' => 'Apple']);

        // FitTypes
        Fittype::create(['name' => 'In-ear']);
        Fittype::create(['name' => 'Over-ear']);
        Fittype::create(['name' => 'On-ear']);
        Fittype::create(['name' => 'Earbuds']);

        // DriverTechnologies
        Drivertechnology::create(['name' => 'Dynamic']);
        Drivertechnology::create(['name' => 'Planar']);
        Drivertechnology::create(['name' => 'Electrostatic']);
        Drivertechnology::create(['name' => 'Bone Conduction']);
        Drivertechnology::create(['name' => 'Piezoelectric']);
        Drivertechnology::create(['name' => 'Balanced Armature']);

        // Backtypes
        Backtype::create(['name' => 'Semi-open-back']);
        Backtype::create(['name' => 'Open-back']);
        Backtype::create(['name' => 'Closed-back']);

        // Rent statuses
        Rentstatus::create(['name' => 'New']);
        Rentstatus::create(['name' => 'Cancelled']);
        Rentstatus::create(['name' => 'In shipping']);
        Rentstatus::create(['name' => 'In use']);
        Rentstatus::create(['name' => 'Returned']);
    }
}
