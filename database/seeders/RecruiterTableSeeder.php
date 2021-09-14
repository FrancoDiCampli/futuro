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




        // $enterprise = Enterprise::create([
        //     'name'          => 'Futuro Talento',
        //     'employees'     => '100',
        //     'sector'        => 'Servicios',
        //     'turn'          => 'Contratacion servicios',
        //     'website'       => 'futuro-talento.com',
        //     'vision'        => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum cupiditate commodi exercitationem non veritatis excepturi, sapiente expedita eos sit, vel earum quia impedit autem possimus velit, numquam nesciunt totam doloremque.',
        //     'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum cupiditate commodi exercitationem non veritatis excepturi, sapiente expedita eos sit, vel earum quia impedit autem possimus velit, numquam nesciunt totam doloremque.',
        //     'rfc'           => '323213213',
        //     'business_name' => 'Futuro Talento S.A.',
        //     'city_id'       => 1
        // ]);

        // Recruiter::create([
        //     'name'          => 'Juan Perez',
        //     'email'         => 'admin@mail.com',
        //     'phone'         => '3735404737',
        //     'user_id'       => 1,
        //     'enterprise_id' => $enterprise->id,
        // ]);

        // File::create([
        //     'path'              => 'logos/logo.png',
        //     'category'          => 'logos',
        //     'original_name'     => 'logo.png',
        //     'mime_type'         => 'png',
        //     'extension'         => 'png',
        //     'fileable_type'     => 'App/Models/Enterprise',
        //     'fileable_id'       => 1,
        // ]);
    }
}
