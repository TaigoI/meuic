<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Disciplina;
use App\Models\Modulo;
use App\Models\Agendamento;

class MainDashboardController extends Controller
{
    public function index(){
        /* $disciplinas = DB::select('select modulos.modulo, disciplinas.id_disciplina, disciplinas.name_disciplina from modulos, 
                                    disciplinas where modulos.id_disciplina = disciplinas.id_disciplina order by modulo ASC');
         */
        //dd($disciplinas);
        
        $query = Modulo::addSelect(['name_disciplina' => Disciplina::select('name_disciplina')
            ->whereColumn('modulos.id_disciplina', 'disciplinas.id_disciplina')
        ])->orderBy('modulo', 'ASC')->get();
        
        $disciplinas = collect();
		$agendamentos = collect();

        foreach ($query as $item) {            
            $disciplinas->put($item->modulo, collect());           
        }

        foreach ($query as $item) {            
            $disciplinas[$item->modulo]->put($item->id_disciplina, $item->name_disciplina);           
        } 

		$semana_atual = date('w');
		$inicio_semana = date('d-m-Y', strtotime('-'.$semana_atual.' days'));
		$fim_semana = date('d-m-Y', strtotime('+'.(6-$semana_atual).' days'));
		if(Auth::user()){
			$aux = []; //TODO
			
			foreach ($aux as $item) {            
				$agendamentos->put($item->id_agendamento, $item);           
			}
		}
        
        return view('main_dashboard', compact('disciplinas', 'agendamentos'));
    }

}