<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		//conhecimento prévio
		$this->call(DisciplinasSeeder::class);
		$this->call(ModulosSeeder::class);
		$this->call(SlotsSeeder::class);

		//exemplos
		$this->call(UserSeeder::class);
		$this->call(MonitoresSeeder::class);
		$this->call(HorariosSeeder::class);
		$this->call(AgendamentosSeeder::class);
		$this->call(AtividadesSeeder::class);
    }
}
