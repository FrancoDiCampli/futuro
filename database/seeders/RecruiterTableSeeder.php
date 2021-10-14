<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\User;
use App\Models\Recruiter;
use App\Models\Enterprise;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RecruiterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'reclutador',
            'email' => 'reclutador@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdf1234'),
        ]);

        $recruiter = Recruiter::create([
                            'first_name'            =>'Juan',
                            'last_name'             =>'Perez',
                            'street_name'           =>'Uruiza',
                            'street_number'         =>'122',
                            'phone'                 =>'3735404737',
                            'belong_enterprise'     =>1,
                            'enterprise_id'         => 1,
                            'city_id'               => 1,
                            'status'                => 1,
        ]);

        $recruiter->user()->save($user);
        $user->assignRole('recruiter');

        $user2 = User::create([
            'name' => 'recruiter',
            'email' => 'recruiter@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdf1234'),
        ]);

        $recruiter = Recruiter::create([
                            'first_name'            =>'Jon',
                            'last_name'             =>'Snow',
                            'phone'                 =>'422334223',
                            'street_name'           =>'Alvear',
                            'street_number'         =>'1222',
                            'belong_enterprise'     => 0,
                            'enterprise_id'         => null,
                            'city_id'               => 2,
                            'status'                => 1,
        ]);

        $recruiter->user()->save($user2);
        $user2->assignRole('recruiter');

    }
}
