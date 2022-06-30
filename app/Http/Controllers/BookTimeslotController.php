<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Monitores;
use App\Models\Disciplina;
use App\Models\Horario;
use App\Models\Slot;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

class BookTimeslotController extends Controller
{
    public function index(){

        $disciplinas_monitoria = $this->makeMap();
        $week_limits = $this->generateDataInterval();
        session()->forget(['idDisc', 'discMonitor', 'selectedDate', 'selectedSlot']);
        
        return view('book_timeslot', compact('disciplinas_monitoria', 'week_limits'));
    }

    public function makeMap(){
       /*  $monitor_disciplina = Monitores::addSelect(['disciplina' => Disciplina::select('name_disciplina')
            ->whereColumn('monitores.id_disciplina', 'disciplinas.id_disciplina')] )->get(); */

        $monitor_disciplina = Monitores::with(['disciplina'])->get();
        //dump($monitor_disciplina);

       

        $disciplinas_monitoria = collect();

        foreach ($monitor_disciplina as $disciplina) {
            $disciplinas_monitoria->put($disciplina->disciplina->name_disciplina, $disciplina->id_disciplina);
        }
        
        //dd($disciplinas_monitoria['ESTRUTURA DE DADOS']);
    
        return $disciplinas_monitoria;
    }

    public function generateDataInterval(){
        $today = CarbonImmutable::now('America/Sao_Paulo');

        /* dump($today->firstWeekDay);                           // int(0)
        dump($today->lastWeekDay);                            // int(6) */
        /* dump($today->startOfWeek()->format('Y-m-d H:i'));     // string(16) "2022-05-01 00:00"
        dump($today->endOfWeek()->format('Y-m-d H:i'));   */   

        //$start_of_week_day = $today->startOfWeek(Carbon::MONDAY);
        $end_of_week_day = $today->endOfWeek(Carbon::FRIDAY);

        if($today->weekday() == 6 || $today->weekday() == 0){ //se sabado ou domingo, so agenda a partir da segunda
            $today = $end_of_week_day->subDays(4);
        } 
        
        /* dump($today->format('Y-m-d'));       
        dump($today < $end_of_week_day);
        dump($start->format('Y-m-d H:i'));                 
        dump($end_of_week_day->format('Y-m-d H:i')); */
       
        $week_limits = [$today->format('Y-m-d'), $end_of_week_day->format('Y-m-d')];
        return $week_limits;
    } 

    public function getMonitoresSlots(Request $request){
        //dump($request);
        $horarios = null;
        if($request->topicoInput != null){ //significa que todos os inputs foram preenchidos e pode ser feito o agendamento
            //dd($request);
            $created = Agendamento::create([
                "id_disciplina" => $request->disciplinaSelect,
                "id_monitor" =>  $request->monitorSelect,
                "data_agendamento" => $request->dataInput,
                "slot_agendamento" => $request->horarioSelect,
                "topico_agendamento" => $request->topicoInput,                           
                "anotacao_agendamento" => $request->anotacoesInput,
            ]);

            if($created){session()->flash('success', 'Agendamento feito com sucesso! Confira seu Google Calendar Institucional.');}
            else{session()->flash('error', 'Opa! Algo deu errado. Tente de novo mais tarde.');}

            return redirect('/timetable/'.$request->disciplinaSelect);
        } else { // aqui vao as ações que renderizam dinamicamente os dropdowns
            if($request->has('disciplinaSelect')){ //dropdown de disciplina
                $idDisc = $request->disciplinaSelect;                
                
                if($idDisc != session('idDisc')){
                    session()->forget(['discMonitor', 'selectedDate','selectedSlot']);

                    session()->put('idDisc', $idDisc);
                    $request->monitorSelect = null;
                    //dd($monitores);
                }           
                $monitores = Monitores::where('id_disciplina', $idDisc)->addselect(['name' => User::select('name')->whereColumn('monitores.id_aluno', 'users.email')])->get();
                
            } if($request->has('monitorSelect')){ //dropdown de monitor
                $id_monitor = $request->monitorSelect;

                if($id_monitor != session('discMonitor')){
                    $request->dataInput = null;
                    session()->forget(['selectedDate', 'selectedSlot']);
                }

                session()->put('discMonitor', $id_monitor);

                $horarios = Horario::where('id_monitor', $id_monitor)->addSelect(['display_name' => Slot::select('display_name')
                ->whereColumn('horarios.slot', 'slots.id_slots')])->get();

                //dump($horarios);
            } if($request->dataInput != null and  session('discMonitor') != null){ //input de data (verifica se o monitor esta disponivel na data escolhida)
                session()->forget(['selectedDate','selectedSlot']);

                $data = Carbon::createFromFormat('Y-m-d', $request->dataInput)->locale('pt_BR');
                $weekday_data = $data->weekday();
                //dump($weekday_data);

                $monitor_on_weekday = Horario::where('dia', $weekday_data)->where('id_monitor', session('discMonitor'))->addSelect(['display_name' => Slot::select('display_name')
                ->whereColumn('horarios.slot', 'slots.id_slots')])->get();
            
                if(count($monitor_on_weekday) == 0){
                    session()->now('error', 'O monitor não está disponível no dia '.$data->format('d/m/Y'));
                } else{
                    session()->put('selectedDate', $request->dataInput);

                    $horarios = $monitor_on_weekday;
                    //dump($horarios);
                }          
            } if($request->horarioSelect != null and  session('selectedDate') != null){ //adiciona o slot selecionado na session
                session()->put('selectedSlot', $request->horarioSelect);
            }

            $disciplinas_monitoria = $this->makeMap();
            $week_limits = $this->generateDataInterval();
    
            return view('book_timeslot', compact('disciplinas_monitoria', 'week_limits', 'monitores', 'horarios'));
        }                    
    }
}
