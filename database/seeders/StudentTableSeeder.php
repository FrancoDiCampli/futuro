<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\City;
use App\Models\File;
use App\Models\User;
use App\Models\Student;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities =  City::select('id')->get();
        $subcategories =  Subcategory::select('id')->get();
        $user = User::create([
            'name' => 'estudiante',
            'email' => 'estudiante@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdf1234'),

        ]);

        $student = Student::create([
            'first_name'    =>'Juana',
            'last_name'     =>'Martinez',
            'tos'           =>1,
            'notification'  =>1,
            'title'         =>'Mas vale tarde que nunca',
            'experience'    =>'Graduado',
            'speech'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates consequatur, fugiat praesentium aliquid consectetur hic iste sequi officiis, enim alias, iure nihil vel porro. Perferendis accusamus asperiores ea id impedit.',
            'available'=>'Tiempo completo',
            'preference'=>'Sin preferencia',
            'skills'=>['Trabajo en Equipo','Capacidad de Liderazgo'],
            'courses'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates consequatur, fugiat praesentium aliquid consectetur hic iste sequi officiis, enim alias, iure nihil vel porro. Perferendis accusamus asperiores ea id impedit.',
            'hobbies'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates consequatur, fugiat praesentium aliquid consectetur hic iste sequi officiis, enim alias, iure nihil vel porro. Perferendis accusamus asperiores ea id impedit.',
            'birthdate'=>Carbon::today()->subYears(20),
            'subcategory_id'=>rand(1,count($subcategories)),
            'city_id'=>rand(1,count($cities)),
        ]);

        $file  = File::create([
            'path'              => 'avatar/'.$student->id.'/juan.png',
            'category'          => 'avatar',
            'original_name'     => 'juan.png',
            'mime_type'         => 'image/png',
            'size'              => 88307,
            'extension'         => 'png',
            'fileable_type'     =>'App\Models\Student',
            'fileable_id'       => $student->id
        ]);

        $student->user()->save($user);
        $user->assignRole('student');

    }
}
