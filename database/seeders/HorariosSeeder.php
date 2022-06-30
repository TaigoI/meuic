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
		//segunda
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 1,'slot' => 0]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 1,'slot' => 1, 'online' => true]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 1,'slot' => 2]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 1,'slot' => 4]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 1,'slot' => 5]);

		//terça
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 2,'slot' => 2]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 2,'slot' => 3]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 2,'slot' => 6]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'dia' => 2,'slot' => 2]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'dia' => 2,'slot' => 3]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'dia' => 2,'slot' => 4]);
		
		//quarta
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 3,'slot' => 0]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 3,'slot' => 1]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'dia' => 3,'slot' => 4]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'dia' => 3,'slot' => 5]);
	
		//quinta
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 4,'slot' => 1]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 4,'slot' => 2]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'dia' => 4,'slot' => 3]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'dia' => 4,'slot' => 4]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'dia' => 4,'slot' => 5]);

		//sexta
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 5,'slot' => 0]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 5,'slot' => 1]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 5,'slot' => 3]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 5,'slot' => 4]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','dia' => 5,'slot' => 5]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'dia' => 5,'slot' => 0]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'dia' => 5,'slot' => 1]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'dia' => 5,'slot' => 2]);
    }
}
