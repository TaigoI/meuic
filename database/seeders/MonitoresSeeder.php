<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Monitores;

class MonitoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Monitores::updateOrCreate(['id_aluno' => 'mjgs@ic.ufal.br','id_disciplina' => 'COMP363']);
        Monitores::updateOrCreate(['id_aluno' =>  'ffv@ic.ufal.br','id_disciplina' => 'COMP363']);
        Monitores::updateOrCreate(['id_aluno' =>  'ebo@ic.ufal.br','id_disciplina' => 'COMP360']);
        Monitores::updateOrCreate(['id_aluno' => 'jals@ic.ufal.br','id_disciplina' => 'COMP362']);
        Monitores::updateOrCreate(['id_aluno' => 'timp@ic.ufal.br','id_disciplina' => 'COMP364']);
        Monitores::updateOrCreate(['id_aluno' => 'dbrs@ic.ufal.br','id_disciplina' => 'COMP364']);
   
    }
}
