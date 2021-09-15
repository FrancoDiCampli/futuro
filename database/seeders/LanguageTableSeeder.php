<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lenguages = ['English','Spanish','Chinese','Portuguese'];

        foreach ($lenguages as $lang) {
           Language::create([
               'name'       => $lang
           ]);
        }
    }
}
