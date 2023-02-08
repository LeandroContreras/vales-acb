<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=>'1',
            'name'=>'Leandro',
            'email'=>'leonc9ntreras0102@gmail.com',
            'password'=>Hash::make('12345678')
        ]);
        DB::table('users')->insert([
            'id'=>'2',
            'name'=>'Abimael',
            'email'=>'abml7@gmail.com',
            'password'=>Hash::make('abml7@gmail.com')
        ]);
    }
}
