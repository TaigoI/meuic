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
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 1,'id_slot' => 0]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 1,'id_slot' => 1, 'online' => true]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 1,'id_slot' => 2]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 1,'id_slot' => 4]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 1,'id_slot' => 5]);

		//terça
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 2,'id_slot' => 2]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 2,'id_slot' => 3]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 2,'id_slot' => 6]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'id_dia' => 2,'id_slot' => 2]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'id_dia' => 2,'id_slot' => 3]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'id_dia' => 2,'id_slot' => 4]);
		
		//quarta
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 3,'id_slot' => 0]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 3,'id_slot' => 1]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'id_dia' => 3,'id_slot' => 4]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'id_dia' => 3,'id_slot' => 5]);
	
		//quinta
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 4,'id_slot' => 1]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 4,'id_slot' => 2]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'id_dia' => 4,'id_slot' => 3]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'id_dia' => 4,'id_slot' => 4]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'id_dia' => 4,'id_slot' => 5]);

		//sexta
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 5,'id_slot' => 0]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 5,'id_slot' => 1]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 5,'id_slot' => 3]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 5,'id_slot' => 4]);
		Horario::updateOrCreate(['id_monitor' => 'timp@ic.ufal.br','id_dia' => 5,'id_slot' => 5]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'id_dia' => 5,'id_slot' => 0]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'id_dia' => 5,'id_slot' => 1]);
		Horario::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br' ,'id_dia' => 5,'id_slot' => 2]);
    }
}
