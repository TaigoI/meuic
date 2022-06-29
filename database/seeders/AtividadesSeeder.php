<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Atividade;

class AtividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Atividade::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br','data_completa' => '2022-05-30','desc_atividade' => "teste de atividade"],[
            'hora_gasto' => 4,
            'min_gasto' => 20,
            'dia_atividade' => 30,
            'mes_atividade' => "MAIO",
            'ano_atividade' => 2022,
        ]);
		Atividade::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br','data_completa' => '2022-06-21','desc_atividade' => "Criação de Questões"],[
            'hora_gasto' => 1,
            'min_gasto' => 30,
            'dia_atividade' => 21,
            'mes_atividade' => "JUNHO",
            'ano_atividade' => 2022,
        ]);
		Atividade::updateOrCreate(['id_monitor' => 'ffv@ic.ufal.br','data_completa' => '2022-06-22','desc_atividade' => "Correção de Provas"],[
            'hora_gasto' => 5,
            'min_gasto' => 0,
            'dia_atividade' => 22,
            'mes_atividade' => "JUNHO",
            'ano_atividade' => 2022,
        ]);
    }
}
