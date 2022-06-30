<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dia;

class DiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//NÃO CRIAR Dia::updateOrCreate(['id_dia' => 0,'display_name' => 'Domingo']);
        Dia::updateOrCreate(['id_dia' => 1,'display_name' => 'Segunda']);
		Dia::updateOrCreate(['id_dia' => 2,'display_name' => 'Terça']);
		Dia::updateOrCreate(['id_dia' => 3,'display_name' => 'Quarta']);
		Dia::updateOrCreate(['id_dia' => 4,'display_name' => 'Quinta']);
		Dia::updateOrCreate(['id_dia' => 5,'display_name' => 'Sexta']);
		//NÃO CRIAR Dia::updateOrCreate(['id_dia' => 6,'display_name' => 'Sábado']);
    }
}
