<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\User;
use App\Models\Enterprise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EnterpriseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'danone',
            'email' => 'danone@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdf1234'),

        ]);

        $enterprise= Enterprise::create([
            'name'              =>'Danone',
            'employees'         =>200,
            'sector'            =>'Alimentos',
            'turn'              =>'Mayoristas',
            'website'           =>'danone.com',
            'vision'            =>' Lorem ipsum dolor, sit amet consectetur adipisicing elit. A sapiente laudantium, architecto suscipit distinctio repellat veniam cumque incidunt repellendus, in sequi sit non ratione consequatur ipsa et fuga doloremque asperiores.',
            'description'       =>' Lorem ipsum dolor, sit amet consectetur adipisicing elit. A sapiente laudantium, architecto suscipit distinctio repellat veniam cumque incidunt repellendus, in sequi sit non ratione consequatur ipsa et fuga doloremque asperiores.',
            'rfc'               =>'23231341',
            'business_name'     =>'Danone SRL',
            'city_id'           =>1,
        ]);

        $file  = File::create([
            'path'              => 'logos/'.$enterprise->id.'/danone.png',
            'category'          => 'logos',
            'original_name'     => 'danone.png',
            'mime_type'         => 'image/png',
            'size'              => 88307,
            'extension'         => 'png',
            'fileable_type'     =>'App\Models\Enterprise',
            'fileable_id'       => $enterprise->id
        ]);

        $enterprise->user()->save($user);
        $user->assignRole('empresa');

    }
}
