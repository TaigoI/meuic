<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Disciplina;

class DisciplinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$cores = ["green", "aqua", "blue", "darkblue"];
		Disciplina::updateOrCreate(['id_disciplina' => "COMP360"],['name_disciplina' => "LÓGICA PARA COMPUTAÇÃO", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP361"],['name_disciplina' => "COMPUTAÇÃO, SOCIEDADE E ÉTICA", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP362"],['name_disciplina' => "MATEMÁTICA DISCRETA", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP363"],['name_disciplina' => "CÁLCULO DIFERENCIAL E INTEGRAL", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP364"],['name_disciplina' => "ESTRUTURA DE DADOS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP365"],['name_disciplina' => "BANCO DE DADOS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP366"],['name_disciplina' => "ORGANIZAÇÃO E ARQUITETURA DE COMPUTADORES", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP367"],['name_disciplina' => "GEOMETRIA ANALÍTICA", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP368"],['name_disciplina' => "REDES DE COMPUTADORES", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP369"],['name_disciplina' => "TEORIA DOS GRAFOS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP370"],['name_disciplina' => "PROBABILIDADE E ESTATÍSTICA", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP371"],['name_disciplina' => "ÁLGEBRA LINEAR", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP372"],['name_disciplina' => "PROGRAMAÇÃO 2", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP373"],['name_disciplina' => "PROGRAMAÇÃO 3", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP374"],['name_disciplina' => "PROJETO E ANÁLISE DE ALGORITMOS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP376"],['name_disciplina' => "TEORIA DA COMPUTAÇÃO", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP378"],['name_disciplina' => "SISTEMAS OPERACIONAIS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP379"],['name_disciplina' => "COMPILADORES", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP380"],['name_disciplina' => "INTELIGÊNCIA ARTIFICIAL", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP381"],['name_disciplina' => "COMPUTAÇÃO GRÁFICA", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP382"],['name_disciplina' => "PROJETO E DESENVOLVIMENTO DE SISTEMAS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP386"],['name_disciplina' => "METODOLOGIA DE PESQUISA E TRABALHO INDIVIDUAL", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP387"],['name_disciplina' => "NOÇÕES DE DIREITO", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP404"],['name_disciplina' => "CÁLCULO 3", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP389"],['name_disciplina' => "CONCEITOS DE LINGUAGEM DE PROGRAMAÇÃO", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP390"],['name_disciplina' => "APRENDIZAGEM DE MÁQUINA", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP391"],['name_disciplina' => "SISTEMAS DIGITAIS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP392"],['name_disciplina' => "SISTEMAS DISTRIBUÍDOS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP393"],['name_disciplina' => "REDES NEURAIS E APRENDIZADO PROFUNDO", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP394"],['name_disciplina' => "FPGA", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP395"],['name_disciplina' => "INTERAÇÃO HOMEM-MÁQUINA", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP396"],['name_disciplina' => "PROCESSAMENTO DIGITAL DE IMAGENS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP397"],['name_disciplina' => "COMPUTAÇÃO EVOLUCIONÁRIA", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP398"],['name_disciplina' => "SISTEMAS EMBARCADOS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP399"],['name_disciplina' => "GERÊNCIA DE PROJETO", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP400"],['name_disciplina' => "VISÃO COMPUTACIONAL", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP401"],['name_disciplina' => "CIÊNCIA DE DADOS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP402"],['name_disciplina' => "MICROCONTROLADORE S E APLICAÇÕES", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP403"],['name_disciplina' => "SEGURANÇA DE SISTEMAS COMPUTACIONAIS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1941"], ['name_disciplina' => "ÁLCULO 4", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1942"], ['name_disciplina' => "ÁLCULO NUMÉRICO", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1943"], ['name_disciplina' => "IRCUITOS DIGITAIS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1944"], ['name_disciplina' => "IRCUITOS IMPRESSOS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1945"], ['name_disciplina' => "UNDAMENTOS DE LIBRAS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1946"], ['name_disciplina' => "EOMETRIA COMPUTACIONAL", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1947"], ['name_disciplina' => "ESQUISA OPERACIONAL", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1948"], ['name_disciplina' => "ROGRAMAÇÃO PARA SISTEMAS EMBARCADOS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1949"], ['name_disciplina' => "ROJETO DE SISTEMAS EMBARCADOS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1950"], ['name_disciplina' => "ÓPICOS EM ARQUITETURA DE COMPUTADORES", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1951"], ['name_disciplina' => "ÓPICOS EM BANCO DE DADOS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1952"], ['name_disciplina' => "ÓPICOS EM COMPUTAÇÃO CIENTÍFICA", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1953"], ['name_disciplina' => "ÓPICOS EM COMPUTAÇÃO PARALELA", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1954"], ['name_disciplina' => "ÓPICOS EM COMPUTAÇÃO VISUAL", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1955"], ['name_disciplina' => "ÓPICOS EM COMUNICAÇÃO DE DADOS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1956"], ['name_disciplina' => "ÓPICOS EM DESENVOLVIMENTO DE SISTEMAS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1957"], ['name_disciplina' => "ÓPICOS EM ENGENHARIA DE SOFTWARE", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1958"], ['name_disciplina' => "ÓPICOS EM HUMANIDADES", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1959"], ['name_disciplina' => "ÓPICOS EM INFORMÁTICA NA EDUCAÇÃO", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1960"], ['name_disciplina' => "ÓPICOS EM INTELIGÊNCIA ARTIFICIAL", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1961"], ['name_disciplina' => "ÓPICOS EM LINGUAGENS DE PROGRAMAÇÃO", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1962"], ['name_disciplina' => "ÓPICOS EM PROGRAMAÇÃO", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1963"], ['name_disciplina' => "ÓPICOS EM REDES DE COMPUTADORES", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1964"], ['name_disciplina' => "ÓPICOS EM SISTEMAS DE COMPUTAÇÃO", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1965"], ['name_disciplina' => "ÓPICOS EM SISTEMAS DE INFORMAÇÃO", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1966"], ['name_disciplina' => "ÓPICOS EM SISTEMAS DISTRIBUÍDOS", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1967"], ['name_disciplina' => "ÓPICOS EM SISTEMAS INTELIGENTES", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "CC1968"], ['name_disciplina' => "ÓPICOS EM SOFTWARE BÁSICO", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP405"],['name_disciplina' => "TÓPICOS EM CIÊNCIA DA COMPUTAÇÃO 1", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP406"],['name_disciplina' => "TÓPICOS EM CIÊNCIA DA COMPUTAÇÃO 2", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP407"],['name_disciplina' => "TÓPICOS EM CIÊNCIA DA COMPUTAÇÃO 3", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP409"],['name_disciplina' => "TÓPICOS EM MATEMÁTICA PARA COMPUTAÇÃO 1", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP410"],['name_disciplina' => "TÓPICOS EM MATEMÁTICA PARA COMPUTAÇÃO 2", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP411"],['name_disciplina' => "TÓPICOS EM MATEMÁTICA PARA COMPUTAÇÃO 3", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP412"],['name_disciplina' => "TÓPICOS EM FÍSICA PARA COMPUTAÇÃO 1", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP413"],['name_disciplina' => "TÓPICOS EM FÍSICA PARA COMPUTAÇÃO 2", 'cor' => $cores[rand(0,3)]]);
		Disciplina::updateOrCreate(['id_disciplina' => "COMP414"],['name_disciplina' => "TÓPICOS EM FÍSICA PARA COMPUTAÇÃO 3", 'cor' => $cores[rand(0,3)]]);
    }
}
