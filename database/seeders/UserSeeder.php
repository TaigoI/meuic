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
            'google_id' => null,
            'email' => 'testes@ic.ufal.br',
            'matricula'=> 1234,
            'name' => "teste",
            'picture' => Str::random(10),
            'teacher_status' => 'NO',
            'user_role' => 'M'
            
        ],[
            'google_id' => null,
            'email' => 'felipe@ic.ufal.br',
            'matricula'=> 4321,
            'name' => "felipe",
            'picture' => Str::random(10),
            'teacher_status' => 'NO',
            'user_role' => 'M'
            
        ]);
    }
}
