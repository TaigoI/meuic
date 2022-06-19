<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'ID' => 1,
            'email' => 'testes@ic.ufal.br',
            'matricula'=> 1234,
            'name' => "teste",
            'picture' => Str::random(10),
            'user_role' => 'monitor'
            
        ],[
            'ID' => 2,
            'email' => 'felipe@ic.ufal.br',
            'matricula'=> 4321,
            'name' => "felipe",
            'picture' => Str::random(10),
            'user_role' => 'monitor'
            
        ]);
    }
}
