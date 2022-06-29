<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('horarios')->insert([
            'id_horario' => 1,
            'id_monitor' => 'ffv@ic.ufal.br',
            'dia' => 2,
            'slot' => 1,
            
        ]);
        DB::table('horarios')->insert([
            'id_horario' => 2,
            'id_monitor' => 'ffv@ic.ufal.br',
            'dia' => 3,
            'slot' => 2,
            
        ]);
    }
}
