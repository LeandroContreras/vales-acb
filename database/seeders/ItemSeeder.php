<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('items')->insert([
            'id'=>'11',
            'des'=>'Gasolina Premium',
        ]);
        DB::table('items')->insert([
            'id'=>'10',
            'des'=>'Gasolina Especial',
        ]);
        DB::table('items')->insert([
            'id'=>'13',
            'des'=>'Gasolina Esp Plus',
        ]);
    }
}
