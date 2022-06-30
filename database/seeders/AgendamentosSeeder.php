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
		Agendamento::updateOrCreate(['id_disciplina' => 'COMP360','id_monitor' => 'ffv@ic.ufal.br'],[
			'data_agendamento' => '28/06/2022',
			'slot_agendamento' => 1,
            'anotacao_agendamento' => 'duvidas da lista',
            'topico_agendamento' => 'big o',
        ]);
        Agendamento::updateOrCreate(['id_disciplina' => 'COMP362','id_monitor' => 'jals@ic.ufal.br'],[
			'data_agendamento' => '29/06/2022',
			'slot_agendamento' => 3,
			'anotacao_agendamento' => 'duvidas da prova',
			'topico_agendamento' => 'ia',
        ]);
    }
}
