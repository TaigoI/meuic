<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Disciplina;
use App\Models\Modulo;
use App\Models\Agendamento;
use App\Models\Horario;
use Illuminate\Database\Eloquent\Builder;

class MainDashboardController extends Controller
{
    public function index(){             
        $disciplinas = collect();
		$agendamentos = collect();

		$modulos = Modulo::all()->unique('modulo');
		foreach($modulos as $modulo){
			$disciplinas->put($modulo->modulo, Disciplina::whereHas('modulo', function (Builder $query) use($modulo) {
				$query->where('modulo', $modulo->modulo);
			})->orderBy('name_disciplina', 'ASC')->get());
		}

		$inicio_semana = date('d-m-Y', strtotime('-'.date('w').' days'));
		$fim_semana = date('d-m-Y', strtotime('+'.(6-date('w')).' days'));
		if(Auth::user()){
			$idMonitor = Auth::user()->email;
			$aux = Agendamento::
			whereBetween('data', [$inicio_semana, $fim_semana])
			->whereHas('horario', function (Builder $query) use($idMonitor) {
				$query
				->where('id_monitor', $idMonitor)
				->where('id_dia', '>=', date('w'))
				->where('ativo', true);
			})
			->get();
			
			foreach ($aux as $agendamento) {   
				$horario = Horario::where('id_horario', $agendamento->id_horario)->first();    
				$agendamentos->put($agendamento->id_agendamento, compact('agendamento', 'horario'));           
			}
		}
        
        return view('main_dashboard', compact('disciplinas', 'agendamentos'));
    }

}