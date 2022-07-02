<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Monitores;
use App\Models\Slot;
use App\Models\Dia;
use App\Models\Horario;
use App\Models\Agendamento;
use Illuminate\Database\Eloquent\Builder;

class ClassTimetableController extends Controller
{

    public function index($idDisciplina){      
        $disciplina = Disciplina::where('id_disciplina', $idDisciplina)->first();
		if(!$disciplina){ return redirect('/'); }

		$empty_timetable = array(1 => array(['size' => 8]), 2 => array(['size'=>8]), 3 => array(['size'=>8]), 4 => array(['size'=>8]), 5 => array(['size'=>8]));
		$monitores = Monitores::where('id_disciplina', $disciplina->id_disciplina)->get();
		$slots = Slot::all();
		$dias = Dia::all();

		$tt = array(array()); //é uma matriz que auxiliará na geração da verdadeira timetable
		foreach($dias as $dia){
			foreach($slots as $slot){
				$tt[$dia->id_dia][$slot->id_slot] = array();
			}
		}

		foreach($monitores as $monitor){
			$horarios = Horario::where('id_monitor', $monitor->id_aluno)->get();
			foreach($horarios as $horario){
				$tt[$horario->id_dia][$horario->id_slot][$monitor->id_aluno] = ['cor' => $monitor->cor, 'online' => $horario->online];
			}
		}

		$dia_atual = date('w');
		$inicio_semana = date('d-m-Y', strtotime('-'.$dia_atual.' days'));
		$fim_semana = date('d-m-Y', strtotime('+'.(6-$dia_atual).' days'));
		
		$timetable = array();
		foreach($dias as $dia){
			$timetable[$dia->id_dia] = array();

			$previous = $tt[$dia->id_dia][1];

			$s = 0; $currentSize = 0;
			while($s < count($slots)){
				if(array_keys($previous) != array_keys($tt[$dia->id_dia][$s])){
					$i = $s - $currentSize; //slot inicial
					$f = max(0, $s - 1); //slot final (limitado a positivos)

					$block = array('size' => $currentSize, 'i' => $i, 'f' => $f);
					if(count($tt[$dia->id_dia][$f])){ //olhando no final, mas poderia ser qualquer posição entre i e f (inclusos)
						$block['data'] = array();
						$past = false;//date('w') > $dia->id_dia;
						foreach(array_keys($tt[$dia->id_dia][$f]) as $m){ //monitor
							$subslots = array();
							foreach(range($i, $f) as $subslot){
								$booked = $this->checkOcupado($m, $dia->id_dia, $subslot);
								array_push($subslots, ['online' => $tt[$dia->id_dia][$subslot][$m]['online'], 'booked' => $booked ? $booked : false, 'past' => $past]);
							}
							$data = array('color' => $tt[$dia->id_dia][$f][$m]['cor'], 'subslots' => $subslots, 'monitor' => $m);
							array_push($block['data'], $data);
						}
					}
					
					array_push($timetable[$dia->id_dia], $block);
					$currentSize = 0;
				}

				$previous = $tt[$dia->id_dia][$s];
				$currentSize += 1;
				$s += 1;
			}

			//dd($timetable[$dia->id_dia], count($timetable[$dia->id_dia]));
			$sum = 0;
			foreach($timetable[$dia->id_dia] as $slot){
				$sum += $slot['size'];
			}
			if($sum < $s){
				array_push($timetable[$dia->id_dia], ['size' => $s-$sum]);
			}
		}
		//dd($tt,$timetable);

		return view('class_timetable', ['disciplina' => $disciplina, 'timetable' => $timetable, 'slots' => $slots, 'dias' => $dias]);
    }

	public function notFound(){      
		return redirect('/');
    }

	public function checkOcupado($idMonitor, $idDia, $idSlot){
		$inicio = date('d-m-Y', strtotime('-'.(date('w')).' days'));
		$fim = date('d-m-Y', strtotime('+'.(6-date('w')).' days'));
		return Agendamento::whereHas('horario', function (Builder $query) use($idMonitor, $idDia, $idSlot) {
			$query
			->where('id_monitor', $idMonitor)
			->where('id_dia', $idDia)
			->where('id_slot', $idSlot);
		})->whereBetween('data', [$inicio, $fim])->first();
	}
}
