<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use App\Models\Student;
use App\Models\Enterprise;
use Illuminate\Database\Seeder;
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
        $this->call([
            CategoryTableSeeder::class,
            CityTableSeeder::class,
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdf1234'),

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
