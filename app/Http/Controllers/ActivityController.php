<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Atividade;
use Illuminate\Contracts\Queue\Monitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Monitores;
use App\Models\User;

class ActivityController extends Controller
{
    //

    public function index(){
        if(!Auth::user()){
			return redirect('/home');
		}
        if(Auth::user()->user_role == 'S'){
			return redirect('/home');
        }
        // Retornar a lista de atividades do monitor logado
        $listaAtvs = Atividade::where('id_monitor','=',Auth::user()->email)->orderBy('data_completa','asc')->get();
        // $listaAtvs = $listaAtvs->sortByDesc('data_completa');
        
        session()->put('idDisc', null);
        $listadisciplinas =  $this->getListaDisciplinas();

        return view('class_dashboard',compact('listadisciplinas','listaAtvs'));
    }

    private function getListaDisciplinas(){
        $listadisciplinas = Disciplina::all();

        return $listadisciplinas;
    }

    public function getMonitoresDisciplina(Request $request){
        $idDisc = $request->id_disciplin;
        session()->put('idDisc', $idDisc);
        try{
            $listaMonitores = Disciplina::find(strtoupper($idDisc))->monitor;
        }
        catch(\Exception $e){
            return response()->json([]);
        }

            
        
        $listaInfos = array();
        foreach ($listaMonitores as $userMonitor){
            $usuario = User::find($userMonitor->id_aluno);
            $listaUserInfo = array("name"=>$usuario->name,"email"=>$usuario->email);
            array_push($listaInfos,$listaUserInfo);
        }

        return response()->json($listaInfos);
    }
    public function getActivites(Request $request){ 
        $idMonitor = $request->id_monitor;
        try{
            $listaAtividades = Atividade::select("*")->where("id_monitor",'=',$idMonitor)->get();
        }
        catch(\Exception $e){
            return response()->json([$idMonitor]);
        }

        $atividades = array();
        foreach ($listaAtividades as $atividadeMonitor){
            $atividade = Atividade::find($atividadeMonitor->id_atividade);
            $atividadeInfos = array("descricao"=>$atividade->desc_atividade,"data"=>$atividade->data_completa,
            "hora"=>$atividade->hora_gasto,"minutos"=>$atividade->min_gasto);
            array_push($atividades,$atividadeInfos);
        }

        return response()->json($atividades);
    }

    public function insert(Request $request){
        
        $data = $request->get('data');
        $mes = Carbon::createFromFormat('Y-m-d', $data)->locale('pt_BR')->monthName;
        list($year,$month,$day)=explode("-", $data);
        
        $tempo = $request->get('tempo_gasto');
        list($hour,$minute)=explode(":", $tempo);

        $created = Atividade::create([
            "id_monitor" => Auth::user()->email,
            "desc_atividade" => $request->get('desc_atividade'),
            "dia_atividade" => $day,
            "mes_atividade" => $mes,
            "ano_atividade" => $year,
            "hora_gasto" => $hour,
            "min_gasto" =>$minute,
            'data_completa' =>$data            
        ]);

        if($created){session()->flash('success', 'Atividade cadastrada!');}
        else{session()->flash('error', 'Opa! Algo deu errado. Tente de novo mais tarde.');}

        return back();        // return view('activities');
    }

}
