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
        Role::create(['name' => 'student']);
        Role::create(['name' => 'enterprise']);
        Role::create(['name' => 'recruiter']);

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
            RecruiterTableSeeder::class,
            PlanTableSeeder::class,
            VacancyTableSeeder::class,
            StudentTableSeeder::class,

        ]);





    }
}
