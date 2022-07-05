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
use Illuminate\Support\Facades\Auth;

class EditTimetableController extends Controller
{
    public function index(Request $r){
		if(!Auth::user()){ return redirect('/'); }

		$monitor = Monitores::where('id_aluno', Auth::user()->email)->first();
		if(!$monitor){ return redirect('/'); }

		if($r->session()->has('editTimetableUpdateDay')){
			$updateDay = session()->get('editTimetableUpdateDay');
			$data = $this->generateTimetable($updateDay, $monitor);

			$tt = $data['timetable'][$updateDay];
			$data['timetable'] = session()->get('timetable');
			$data['timetable'][$updateDay] = $tt;
		} else {
			$data = $this->generateTimetable(null, $monitor);
		}

		return view('edit_timetable', ['timetable' => $data['timetable'], 'slots' => $data['slots'], 'dias' => $data['dias']]);
    }

	public function updateField($idDia, $idSlot){
		if(!Auth::user()){ return redirect('/'); }
		if(!Dia::where('id_dia', $idDia)->first()){ return redirect('/'); }
		if(!Slot::where('id_slot', $idSlot)->first()){ return redirect('/'); }
		
		$monitor = Monitores::where('id_aluno', Auth::user()->email)->first();
		$horario = Horario::where('id_monitor', $monitor->id_aluno)
		->where('id_dia', $idDia)
		->where('id_slot', $idSlot)
		->first();
		
		$baseInformation = ['id_monitor' => $monitor->id_aluno, 'id_dia' => $idDia, 'id_slot' => $idSlot];
		
		$i = date('d-m-Y', strtotime('-'.date('w').' days'));
		$f = date('d-m-Y', strtotime('+'.(6-date('w')).' days'));

		if(!$horario){
			Horario::create($baseInformation);
		} else {
			$agendamento = Agendamento::
				where('id_horario', $horario->id_horario)
				->whereBetween('data', [$i, $f])
				->first();
			if($agendamento){
				session()->flash('error', 'Não é possível alterar um horário que já possui agendamento marcado para a semana.');
				return redirect('/edit/timetable');
			}

			if($horario->ativo){
				if($horario->online){
					Horario::updateOrCreate($baseInformation,['ativo' => false, 'online' => false]);
				} else {
					Horario::updateOrCreate($baseInformation,['ativo' => true, 'online' => true]);
				}
			} else {
				Horario::updateOrCreate($baseInformation,['ativo' => true, 'online' => false]);
			}
		}

		return redirect('/edit/timetable')->with('editTimetableUpdateDay', $idDia);
	}

	function generateTimetable($updatedDay, $monitor){
		$slots = Slot::all();
		$dias = Dia::all();

		$tt = array(array());
		$horarios = Horario::where('id_monitor', $monitor->id_aluno)->where('ativo', true)->get();
		foreach($dias as $dia){
			foreach($slots as $slot){
				$horario = $horarios->where('id_dia', $dia->id_dia)->where('id_slot', $slot->id_slot)->first();
				$tt[$dia->id_dia][$slot->id_slot] = $horario ? array('cor' => $monitor->cor, 'online' => $horario->online) : array() ;
			}
		}

		$timetable = array();
		$listaDiasAtualizar = $updatedDay ? Dia::where('id_dia', $updatedDay)->get() : $dias;
		foreach($listaDiasAtualizar as $dia){
			$timetable[$dia->id_dia] = array();
			$previous = $tt[$dia->id_dia][0];

			$s = 0; $currentSize = 0;
			while($s < count($slots)){
				if(array_keys($previous) != array_keys($tt[$dia->id_dia][$s])){
					$i = $s - $currentSize; //slot inicial
					$f = max(0, $s - 1); //slot final (limitado a positivos)

					$block = array('size' => $currentSize, 'i' => $i, 'f' => $f);
					$block = $this->getBlock($block, $tt, $dia->id_dia, $monitor);
					
					array_push($timetable[$dia->id_dia], $block);
					$currentSize = 0;
				}

				$previous = $tt[$dia->id_dia][$s];
				$currentSize += 1;
				$s += 1;
			}

			$finalSlot =  [ 'size' => $currentSize, 'i' => $s - $currentSize, 'f' => $s-1];
			if(count(array_keys($tt[$dia->id_dia][$s-1]))){
				$finalSlot = $this->getBlock($finalSlot, $tt, $dia->id_dia, $monitor);
			}
			array_push($timetable[$dia->id_dia], $finalSlot);
		}

		return compact('timetable', 'slots', 'dias');
	}

	function getBlock($block, $tt, $idDia, $monitor){
		if(count($tt[$idDia][$block['f']])){ //olhando no final, mas poderia ser qualquer posição entre i e f (inclusos)
			foreach(array_keys($tt[$idDia][$block['f']]) as $m){ //monitor
				$subslots = array();
				foreach(range($block['i'], $block['f']) as $subslot){
					$booked = $this->checkOcupado($monitor->id_aluno, $idDia, $subslot);
					array_push($subslots, ['online' => $tt[$idDia][$subslot]['online'], 'booked' => $booked ? $booked : false]);
				}
				$block['color'] = $tt[$idDia][$block['f']]['cor'];
				$block['subslots'] = $subslots;
			}
		}
		return $block;
	}

	function checkOcupado($idMonitor, $idDia, $idSlot){
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
