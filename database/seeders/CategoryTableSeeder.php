<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Logistica'=>[
                            'Chofer',
                            'Repartidor',
                            'Consultor Jr'],
            'Ventas'=>[
                            'Vendedor Minorista',
                            'Vendedor Mayorista',
                            'Analista de Ventas'
            ],
            'Contabilidad'=>[
                            'Auditor Jr',
                            'Auditor Sr',
                            'Contador'
            ],
            'Mercadotecnia'=>[
                            'Community Manager',
                            'Anunciante'
            ],
            'Desarrollo'=>[
                            'Desarrollador Web',
                            'Tester QA',
                            'Desarrollador Mobile'
            ]
        ];

        foreach ($categories as $key=>$value) {
            $cat = Category::create([
                'name'      =>  $key
            ]);
            $subcategories =  $categories[$key];
            foreach ($subcategories as $subcategory) {
                Subcategory::create([
                    'name'          => $subcategory,
                    'category_id'   => $cat->id
                ]);
            }
        }



    }
}
