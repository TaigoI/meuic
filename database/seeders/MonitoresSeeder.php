<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MonitoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('monitores')->insert([
            'id_aluno' => 'mjgs@ic.ufal.br',
            'id_disciplina' => 'COMP363'
        ]);

         DB::table('monitores')->insert([
            'id_aluno' => 'ffv@ic.ufal.br',
            'id_disciplina' => 'COMP363'
        ]); 
        DB::table('monitores')->insert([
            'id_aluno' => 'ebo@ic.ufal.br',
            'id_disciplina' => 'COMP360'
        ]); 
        DB::table('monitores')->insert([
            'id_aluno' => 'jals@ic.ufal.br',
            'id_disciplina' => 'COMP362'
        ]);
   
        DB::table('monitores')->insert([
            'id_aluno' => 'timp@ic.ufal.br',
            'id_disciplina' => 'COMP364'
        ]);
   
        DB::table('monitores')->insert([
            'id_aluno' => 'dbrs@ic.ufal.br',
            'id_disciplina' => 'COMP364'
        ]);
   
    }
}
