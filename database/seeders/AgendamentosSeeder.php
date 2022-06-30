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
			'id_disciplina' => 'COMP361',
			'id_monitor' => 'ffv@ic.ufal.br',
			'data_agendamento' => "28-06-2022",
			'slot_agendamento' => 2
			],[
            'anotacao_agendamento' => 'Questões 1 a 7 (Computador vs. Ética)',
            'topico_agendamento' => 'Lista',
        ]);
		Agendamento::updateOrCreate([
			'id_disciplina' => 'COMP361',
			'id_monitor' => 'ffv@ic.ufal.br',
			'data_agendamento' => "28-06-2022",
			'slot_agendamento' => 3
			],[
            'anotacao_agendamento' => 'Questões 1 a 7 (Computador vs. Ética)',
            'topico_agendamento' => 'Lista',
        ]);
		Agendamento::updateOrCreate([
			'id_disciplina' => 'COMP361',
			'id_monitor' => 'timp@ic.ufal.br',
			'data_agendamento' => "28-06-2022",
			'slot_agendamento' => 6
			],[
            'anotacao_agendamento' => 'Grupos 3 e 5',
            'topico_agendamento' => 'Acompanhamento dos Projetos',
        ]);
	}
}
