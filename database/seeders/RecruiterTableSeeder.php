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
                            'belong_enterprise'     => 1,
                            'enterprise_id'         => 1,
                            'city_id'               => 2,
                            'status'                => 1,
        ]);

        $recruiter->user()->save($user2);
        $user2->assignRole('recruiter');

    }
}
