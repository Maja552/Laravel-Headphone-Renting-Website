<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(DictionarySeeder::class);
        $this->call(HeadphoneSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(RentSeeder::class);
        $this->call(RentedunitSeeder::class);
        $this->call(RentextensionSeeder::class);
    }
}
