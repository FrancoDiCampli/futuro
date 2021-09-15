<?php

namespace Database\Seeders;

use App\Models\Software;
use Illuminate\Database\Seeder;

class SoftwareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $softwares = ['Word','Excel','Windows','Power Point'];

        foreach ($softwares as $software) {
           Software::create([
               'name'       => $software
           ]);
        }
    }
}
