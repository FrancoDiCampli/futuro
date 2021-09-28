<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name'  =>'Normal',
            'price' => 200
        ]);

        Plan::create([
            'name'  =>'Premium',
            'price' => 300
        ]);
    }
}
