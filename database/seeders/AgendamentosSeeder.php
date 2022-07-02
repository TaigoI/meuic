<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Agendamento;

class AgendamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeder de agendamento
		Agendamento::updateOrCreate([
			'id_horario' => 10,
			'data' => '2022-06-28',
			'anotacao' => 'Questões 1 a 7 (Computador vs. Ética)',
            'topico' => 'Lista (Parte 1)',
        ]);
		Agendamento::updateOrCreate([
			'id_horario' => 11,
			'data' => '2022-06-28',
            'anotacao' => 'Questões 8 a 14 (Computador vs. Ética)',
            'topico' => 'Lista (Parte 2)',
        ]);
		Agendamento::updateOrCreate([
			'id_horario' => 5,
			'data' => '2022-06-27',
            'anotacao' => 'Grupo 3',
            'topico' => 'Acompanhamento de Projeto',
        ]);
	}
}
