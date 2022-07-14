<?php

namespace App\Http\Controllers;


use App\Models\Agendamento;
use App\Models\Monitores;
use App\Models\Disciplina;
use App\Models\Horario;
use App\Models\Dia;
use App\Models\Slot;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
class BookTimeslotController extends Controller
{
    public function index(){
		if(!Auth::user()){ return redirect('/'); }

		$data = array('lista_disciplinas' => $this->disciplinasDisponiveis());

		if(!session()->has('disciplina')){ return view('book_timeslot', $data); }
		$data['lista_monitores'] = $this->monitoresDisponiveis(session()->get('disciplina'));

		if(!session()->has('monitor')){ return view('book_timeslot', $data); }
		$data['lista_dias'] = $this->diasDisponiveis(session()->get('monitor'));

		if(!session()->has('dia')){ return view('book_timeslot', $data); }
		$data['lista_slots'] = $this->slotsDisponiveis(session()->get('monitor'), session()->get('dia'));

		if(!session()->has('slot')){ return view('book_timeslot', $data); }
		$data['allow'] = true;
		$data['horario_selecionado'] = $this->checkExiste(session()->get('monitor'), session()->get('dia'), session()->get('slot'));

		return view('book_timeslot', $data);
    }

	public function resetAll(){
		session()->forget(['disciplina', 'monitor', 'dia', 'slot']);

		return redirect('/book');
	}



	public function disciplinaForm(Request $request){ //base of cascading post requests
		if(!array_key_exists('disciplina',$request->all())){ return redirect('/book/resetAll'); }
		return $this->disciplina($request->all()['disciplina']);
	}

	public function disciplina($idDisciplina){ //base of cascading post requests
		$d = $this->disciplinasDisponiveis()->where('id_disciplina', $idDisciplina)->first();
		if(!$d){ return redirect('/book/resetAll'); }
		
		session()->forget(['monitor', 'dia', 'slot', 'allow']);
		return redirect('/book')
			->with('disciplina', $idDisciplina);
	}



	public function monitorForm(Request $request, $idDisciplina){ //base of cascading post requests
		if(!array_key_exists('monitor',$request->all())){ return $this->disciplina($idDisciplina); }
		return $this->monitor($idDisciplina, $request->all()['monitor']);
	}

	public function monitor($idDisciplina, $idMonitor){
		$m = $this->monitoresDisponiveis($idDisciplina)->where('id_aluno', $idMonitor)->first();
		if(!$m){ return $this->disciplina($idDisciplina); }
		
		session()->forget(['dia', 'slot', 'allow']);
		return redirect('/book')
			->with('disciplina', $idDisciplina)
			->with('monitor', $idMonitor);
	}



	public function diaForm(Request $request, $idDisciplina, $idMonitor){ //base of cascading post requests
		if(!array_key_exists('dia',$request->all())){ return $this->monitor($idDisciplina, $idMonitor); } 
		return $this->dia($idDisciplina, $idMonitor, $request->all()['dia']);
	}

	public function dia($idDisciplina, $idMonitor, $idDia){
		$d = $this->diasDisponiveis($idMonitor)->where('id_dia', $idDia)->first();
		if(!$d){ return $this->monitor($idDisciplina, $idMonitor); }
		
		session()->forget(['slot', 'allow']);
		return redirect('/book')
			->with('disciplina', $idDisciplina)
			->with('monitor', $idMonitor)
			->with('dia', $idDia);
	}



	public function slotForm(Request $request, $idDisciplina, $idMonitor, $idDia){ //base of cascading post requests
		if(!array_key_exists('slot',$request->all())){ return $this->dia($idDisciplina, $idMonitor, $idDia); } 
		return $this->slot($idDisciplina, $idMonitor, $idDia, $request->all()['slot']);
	}

	public function slot($idDisciplina, $idMonitor, $idDia, $idSlot){
		$s = $this->slotsDisponiveis($idMonitor, $idDia)->where('id_slot', $idSlot)->first();
		if(!$s){ return $this->dia($idDisciplina, $idMonitor, $idDia); }
		
		session()->forget(['allow']);
		return redirect('/book')
			->with('disciplina', $idDisciplina)
			->with('monitor', $idMonitor)
			->with('dia', $idDia)
			->with('slot', $idSlot);
	}



	public function disciplinasDisponiveis(){
        $disciplinas = Disciplina::
		has('monitor')
		->orderBy('id_disciplina', 'ASC')
		->get();

		return $disciplinas;
    }

	public function monitoresDisponiveis($idDisciplina){
		$monitores = Monitores::
		where('id_disciplina', $idDisciplina)
		->orderBy('id_monitor', 'ASC')
		->get();

		/*$filtered = [];
		//Comentado por ser de altíssimo custo (cascade de todas as funções "Disponiveis")
		//Procurar solução melhor utilizando o Eloquent... possivelmente subquery, embora
		//... que subquery pode cair no mesmo problema de custo alto, o ideal seria query
		//... com group by e distinct id_monitor, utilizando joins até chegar em agendamento
		foreach($monitores as $monitor){
			if(!count($this->diasDisponiveis($monitor->id_aluno))){
				array_push($filtered, $monitor->id_monitor);
			}
		}*/

		return $monitores;//->except($filtered);
	}

	public function diasDisponiveis($idMonitor){
		$dias = Dia::
		whereHas('horario', function (Builder $query) use($idMonitor) {
			$query
			->where('id_monitor', $idMonitor)
			->where('ativo', true);
		})
		->orderBy('id_dia', 'ASC')
		->get();

		$filtered = [];
		//Mantido, PORÉM, é de altíssimo custo (por chamar a função slotsDisponiveis)
			//Chamada para esta função foi comentada em monitoresDisponiveis por cascade
			//O(m monitores * d dias * s slots) é exponencial 2^K onde K é a quantidade de bits...
		//Se for possível fazer por subquery ou whereDoesntHave com filtro de count, é muito mais interessante...
		foreach($dias as $dia){
			$slots = $this->slotsDisponiveis($idMonitor, $dia->id_dia);
			$checkPrevious = $dia->id_dia >= date('w');
			
			//FIXME Ativar quando em produção para evitar agendamentos anteriores...
			if(!count($slots)/* || $checkPrevious */){ 
				array_push($filtered, $dia->id_dia);
			}
		}

		return $dias->except($filtered);
	}

	public function slotsDisponiveis($idMonitor, $idDia){
		return Slot::
		whereHas('horario', function (Builder $query) use($idMonitor, $idDia) {
			$query
			->where('id_monitor', $idMonitor)
			->where('id_dia', $idDia)
			->where('ativo', true);
		})
		->whereDoesntHave('horario.agendamento', function (Builder $query) use($idMonitor, $idDia) {
			$inicio = date('d-m-Y', strtotime('-'.(date('w')).' days'));
			$fim = date('d-m-Y', strtotime('+'.(6-date('w')).' days'));
			
			$query
			->where('id_monitor', $idMonitor)
			->where('id_dia', $idDia)
			->whereBetween('data', [$inicio, $fim]);
		})
		->orderBy('id_slot', 'ASC')
		->get();
	}



	public function checkOcupado($idMonitor, $idDia, $idSlot){
		return Agendamento::
		whereHas('horario', function (Builder $query) use($idMonitor, $idDia, $idSlot) {
			$inicio = date('d-m-Y', strtotime('-'.(date('w')).' days'));
			$fim = date('d-m-Y', strtotime('+'.(6-date('w')).' days'));

			$query
			->where('id_monitor', $idMonitor)
			->where('id_dia', $idDia)
			->where('id_slot', $idSlot)
			->whereBetween('data', [$inicio, $fim]);
		})
		->first();
	}

	public function checkExiste($idMonitor, $idDia, $idSlot){
		return Horario::
		where('ativo', true)
		->where('id_monitor', $idMonitor)
		->where('id_dia', $idDia)
		->where('id_slot', $idSlot)
		->first();
	}



	public function save(Request $request, $idDisciplina, $idMonitor, $idDia, $idSlot){
		
		$horario = $this->checkExiste($idMonitor, $idDia, $idSlot);
		if(!$horario){
			session()->flash('error', 'O horário selecionado não existe... Tente novamente');
			return redirect('/book/resetAll');
		}

		// if(!$this->checkOcupado($idMonitor, $idDia, $idSlot)){
		// 	session()->flash('error', 'O horário selecionado está ocupado... Tente novamente');
		// 	return $this->monitor($idDisciplina, $idMonitor);
		// }

		// if(!array_key_exists('slot',$request->all())){ return $this->dia($idDisciplina, $idMonitor, $idDia); } 
		

		Agendamento::create([
		'id_horario'=>$horario->id_horario,
		'data'=>date('d/m/Y', strtotime('+'.($horario->id_dia-date('w')).' days')),
		'topico'=>(array_key_exists('topico',$request->all()) ? $request->all()['topico'] : "Tópico não especificado..."),
		'anotacao'=>(array_key_exists('anotacoes',$request->all()) ? $request->all()['anotacoes'] : "Anotações não especificadas..."),
		'requerente'=>Auth::user()->email]); 
		
		$topico = $request->all()['topico'];
		//"2022-07-08T17:10:00.52-03:00"
		// data + T + horaInicial+.52-03:00

		$horaInicio = Slot::find($idSlot)->start_slot;
		$horaFinal = Slot::find($idSlot)->end_slot;
		$stringDataHoraInicio = date('Y-m-d', strtotime('+'.($horario->id_dia-date('w')).' days')).'T'.$horaInicio.':00.52-03:00';
		$stringDataHoraFinal = date('Y-m-d', strtotime('+'.($horario->id_dia-date('w')).' days')).'T'.$horaFinal.':00.52-03:00';
		
		$userToken = Auth::user()->google_token;
		

		$response = Http::withToken($userToken)->post('https://www.googleapis.com/calendar/v3/calendars/primary/events?conferenceDataVersion=1',[
			"end" => [
				  "dateTime" => $stringDataHoraFinal
			   ], 
			"start" => [
				"dateTime" => $stringDataHoraInicio
				  ], 
			"conferenceData" => [
						"createRequest" => [
						   "requestId" => "1" 
						] 
					 ], 
			"attendees" => [
							  [
								 "email" => $idMonitor
								 
							  ] 
						   ], 
			"summary" => "Meu@IC: $topico",
			"description" => $request->all()['anotacoes']
		 ]);

		
		session()->flash('success', 'Agendamento feito com sucesso! Confira seu Google Calendar Institucional.');
		return redirect('/book/resetAll');


	}
}
