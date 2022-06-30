<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Monitores;
use App\Models\Slot;
use App\Models\Dia;
use App\Models\Horario;
use App\Models\Agendamento;

class ClassTimetableController extends Controller
{
	public function getTimetable(){
		$timetable = [
			'Segunda' => array(
				['size' => 3, 'data' => [
					['color' => 'aqua', 'subslots' => [
						['booked' => true],['online' => true],[],
					]]
				]],
				['size' => 1],
				['size' => 2, 'data' => [
					['color' => 'aqua', 'subslots' => [
						[],[],
					]]
				]]
			),
			'Terça' => array(
				['size' => 2],
				['size' => 2, 'data' => [
					['color' => 'aqua', 'subslots' => [
						[],[],
					]],
					['color' => 'blue', 'subslots' => [
						[],[],
					]],
				]],
				['size' => 1, 'data' => [
					['color' => 'blue', 'subslots' => [
						[],
					]],
				]],
				['size' => 1]
			),
			'Quarta' => array(
				['size' => 2, 'data' => [
					['color' => 'aqua', 'subslots' => [
						[],[],
					]]
				]],
				['size' => 2],
				['size' => 2, 'data' => [
					['color' => 'blue', 'subslots' => [
						[],[],
					]],
				]]
			),
			'Quinta' => array(
				['size' => 1],
				['size' => 2, 'data' => [
					['color' => 'aqua', 'subslots' => [
						[],[],
					]],
				]],
				['size' => 3, 'data' => [
					['color' => 'blue', 'subslots' => [
						[],[],[],
					]],
				]]
			),
			'Sexta' => array(
				['size' => 2, 'data' => [
					['color' => 'aqua', 'subslots' => [
						[],[],
					]],
					['color' => 'blue', 'subslots' => [
						[],[],
					]],
				]],
				['size' => 1, 'data' => [
					['color' => 'blue', 'subslots' => [
						[]
					]],
				]],
				['size' => 3, 'data' => [
					['color' => 'aqua', 'subslots' => [
						[],[],[],
					]]
				]]
			)
		];
	}

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
				$tt[$dia->id_dia][$slot->id_slots] = array();
			}
		}

		foreach($monitores as $monitor){
			$horarios = Horario::where('id_monitor', $monitor->id_aluno)->get();
			foreach($horarios as $horario){
				$tt[$horario->dia][$horario->slot][$monitor->id_aluno] = ['cor' => $monitor->cor, 'online' => $horario->online];
			}
		}

		$semana_atual = date('w');
		$inicio_semana = date('d-m-Y', strtotime('-'.$semana_atual.' days'));
		$fim_semana = date('d-m-Y', strtotime('+'.(6-$semana_atual).' days'));
		
		$timetable = array();
		foreach($dias as $dia){
			$timetable[$dia->id_dia] = array();
			
			$previous = $tt[$dia->id_dia][1];

			$s = 0; $currentSize = 0;
			while($s < count($slots)){
				if(array_keys($previous) != array_keys($tt[$dia->id_dia][$s])){
					$s = $s ? $s-1 : $s; //volta S para o anterior, mantendo s >= 0
					$block = array('size' => $currentSize);
					if(count($tt[$dia->id_dia][$s])){
						$block['data'] = array();

						foreach(array_keys($tt[$dia->id_dia][$s]) as $m){ //monitor
							$subslots = array();

							foreach(range(0,$currentSize-1) as $subslot){
								//TODO: corrigir bug com forma de determinar se já foi agendado
								$booked = Agendamento::where('id_disciplina', $disciplina->id_disciplina)
									->where('id_monitor', $m)
									->whereBetween('data_agendamento', [$inicio_semana, $fim_semana])
									->where('slot_agendamento', $s-$subslot)
									->first();

								array_push($subslots, ['online' => $tt[$dia->id_dia][$s-$subslot][$m]['online'], 'booked' => $booked != null ? $booked : false]);
							}
							$data = array('color' => $tt[$dia->id_dia][$s][$m]['cor'], 'subslots' => $subslots);
							array_push($block['data'], $data);
						}
					}
					
					array_push($timetable[$dia->id_dia], $block);
					$currentSize = 0;
					$s+=1; //volta S para o que era antes de entrar no if
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
}
