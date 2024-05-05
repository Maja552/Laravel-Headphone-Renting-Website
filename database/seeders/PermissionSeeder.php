<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.store']);
        Permission::create(['name' => 'users.destroy']);
        Permission::create(['name' => 'users.change_role']);

        Permission::create(['name' => 'logs.index']);

        $tableNames = [
            'drivertechnologies',
            'fittypes',
            'backtypes',
            'manufacturers',
            'headphones',
            'units',
            'rents',
            'rentedunits',
            'rentextensions',
            'rentstatuses'
        ];

        foreach ($tableNames as $tableName) {
            Permission::create(['name' => $tableName.'.index']);
            Permission::create(['name' => $tableName.'.manage']);
        }

        // ADMINISTRATOR SYSTEMU
        $adminRole = Role::findByName(config('auth.roles.admin'));
        $adminRole->givePermissionTo('users.index');
        $adminRole->givePermissionTo('users.store');
        $adminRole->givePermissionTo('users.destroy');
        $adminRole->givePermissionTo('users.change_role');
        $adminRole->givePermissionTo('logs.index');
        foreach ($tableNames as $tableName) {
            $adminRole->givePermissionTo($tableName.'.index');
            $adminRole->givePermissionTo($tableName.'.manage');
        }

        // PRACOWNIK SYSTEMU
        $workerRole = Role::findByName(config('auth.roles.worker'));
        foreach ($tableNames as $tableName) {
            $workerRole->givePermissionTo($tableName.'.index');
        }

        // UŻYTKOWNIK SYSTEMU
        $userRole = Role::findByName(config('auth.roles.user'));
        $userRole->givePermissionTo('rents.index');
    }
}
