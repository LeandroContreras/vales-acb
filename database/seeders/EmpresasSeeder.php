<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'id'=>'1',
            'nombre'=>'SOBOCE',
            'abrev'=>'SOBOCE'
        ]);
        DB::table('empresas')->insert([
            'id'=>'2',
            'nombre'=>'BID',
            'abrev'=>'BID'
        ]);
        DB::table('empresas')->insert([
            'id'=>'3',
            'nombre'=>'UNICEF',
            'abrev'=>'UNICEF'
        ]);
        DB::table('empresas')->insert([
            'id'=>'4',
            'nombre'=>'SITTEL',
            'abrev'=>'SITTEL'
        ]);
        DB::table('empresas')->insert([
            'id'=>'5',
            'nombre'=>'PL480',
            'abrev'=>'PL480'
        ]);
        DB::table('empresas')->insert([
            'id'=>'103',
            'nombre'=>'FONDO NACIONAL DE INVERSION PRODUCTIVA SOCIAL',
            'abrev' => 'FPS'
        ]);
        DB::table('empresas')->insert([
            'id'=>'96',
            'nombre'=>'PNUD',
            'abrev' => 'PNUD'
        ]);
    }
}
