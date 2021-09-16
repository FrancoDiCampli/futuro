<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use App\Models\Student;
use App\Models\Enterprise;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'estudiante']);
        Role::create(['name' => 'empresa']);
        Role::create(['name' => 'reclutador']);

        $superadmin = User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdf1234'),

        ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdf1234'),
        ]);

        $superadmin->assignRole('superadmin');
        $admin->assignRole('admin');

        $this->call([
            CategoryTableSeeder::class,
            CityTableSeeder::class,
            SoftwareTableSeeder::class,
            LanguageTableSeeder::class,
            EnterpriseTableSeeder::class,
        ]);
        // City::factory()
        // ->count(20)
        // ->create();

        // User::factory()
        //     ->count(10)
        //     ->create();

        // Enterprise::factory()
        // ->count(2)
        // ->create();

        // Student::factory()
        // ->count(10)
        // ->create();




    }
}
