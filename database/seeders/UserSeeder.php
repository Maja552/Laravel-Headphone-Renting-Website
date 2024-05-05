<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // TESTOWY UŻYTKOWNIK - ADMIN
        $admin = User::create([
            'name' => 'Administrator Testowy',
            'email' => 'admin.test@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ]);
        $adminRole = Role::findByName(config('auth.roles.admin'));
        $admin->assignRole($adminRole);

        // TESTOWY UŻYTKOWNIK - PRACOWNIK
        $worker = User::create([
            'name' => 'Pracownik Testowy',
            'email' => 'worker.test@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ]);
        $workerRole = Role::findByName(config('auth.roles.worker'));
        $worker->assignRole($workerRole);

        // TESTOWY UŻYTKOWNIK - ZWYKŁY UŻYTKOWNIK
        $user = User::create([
            'name' => 'Użytkownik Testowy',
            'email' => 'user.test@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ]);
        $userRole = Role::findByName(config('auth.roles.user'));
        $user->assignRole($userRole);
    }
}
