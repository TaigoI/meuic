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
			'data' => '2022-07-05',
			'requerente' => 'user@ic.ufal.br'
		],[
			'anotacao' => 'Questões 1 a 7 (Computador vs. Ética)',
            'topico' => 'Lista (Parte 1)',
        ]);
		
		Agendamento::updateOrCreate([
			'id_horario' => 11,
			'data' => '2022-07-05',
			'requerente' => 'user@ic.ufal.br'
		],[
			'anotacao' => 'Questões 8 a 14 (Computador vs. Ética)',
            'topico' => 'Lista (Parte 2)',
        ]);

		Agendamento::updateOrCreate([
			'id_horario' => 22,
			'data' => '2022-07-08',
			'requerente' => 'user@ic.ufal.br'
		],[
			'anotacao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin leo tortor, scelerisque ut sapien et, tempor viverra justo. Praesent sodales venenatis consequat.',
            'topico' => 'Acompanhamento de Projetos',
        ]);

		Agendamento::updateOrCreate([
			'id_horario' => 23,
			'data' => '2022-07-08',
			'requerente' => 'ebo@ic.ufal.br'
		],[
			'anotacao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin leo tortor, scelerisque ut sapien et, tempor viverra justo. Praesent sodales venenatis consequat.',
            'topico' => 'O que é Ética',
        ]);

		Agendamento::updateOrCreate([
			'id_horario' => 24,
			'data' => '2022-07-08',
			'requerente' => 'jals@ic.ufal.br'
		],[
			'anotacao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin leo tortor, scelerisque ut sapien et, tempor viverra justo. Praesent sodales venenatis consequat.',
            'topico' => 'Dúvidas no trabalho de Computação vs Ética',
        ]);
	}
}
