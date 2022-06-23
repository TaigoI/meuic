<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
        DB::table('atividades')->insert([
            'id_monitor' => 'testes@ic.ufal.br',
            'desc_atividade' => "teste de atividade" ,
            'hora_gasto' => 4,
            'min_gasto' => 20,
            'id_atividade' => 1,
            'dia_atividade' => 30,
            'mes_atividade' => "MAIO",
            'ano_atividade' => 2022,
            'data_completa' => '2022-05-30'
        ]);
    }
}
