<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Horario;

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
        Horario::updateOrCreate([
            'id_monitor' => 'ffv@ic.ufal.br',
            'dia' => 2,
            'slot' => 1
        ]);
        Horario::updateOrCreate([
            'id_monitor' => 'ffv@ic.ufal.br',
            'dia' => 3,
            'slot' => 2
        ]);
		Horario::updateOrCreate([
            'id_monitor' => 'timp@ic.ufal.br',
            'dia' => 4,
            'slot' => 1
        ]);
		Horario::updateOrCreate([
            'id_monitor' => 'timp@ic.ufal.br',
            'dia' => 4,
            'slot' => 2
        ]);
		Horario::updateOrCreate([
            'id_monitor' => 'timp@ic.ufal.br',
            'dia' => 4,
            'slot' => 3
        ]);
    }
}
