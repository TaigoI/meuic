<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use Illuminate\Contracts\Queue\Monitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Monitores;

class ActivitieController extends Controller
{
    //

    public function index(){
        // Retornar a lista de atividades do monitor logado
        $listaAtvs = Atividade::where('id_monitor','=',Auth::user()->email)->orderBy('data_completa','asc')->get();
        // $listaAtvs = $listaAtvs->sortByDesc('data_completa');
        return view('class_dashboard',compact('listaAtvs'));
    }

    public function insert(Request $request){
        
        $data = $request->get('data');
        $mes = Carbon::createFromFormat('Y-m-d', $data)->locale('pt_BR')->monthName;
        list($year,$month,$day)=explode("-", $data);
        
        $tempo = $request->get('tempo_gasto');
        list($hour,$minute)=explode(":", $tempo);

        Atividade::create([
            "id_monitor" => Auth::user()->email,
            "desc_atividade" => $request->get('desc_atividade'),
            "dia_atividade" => $day,
            "mes_atividade" => $mes,
            "ano_atividade" => $year,
            "hora_gasto" => $hour,
            "min_gasto" =>$minute,
            'data_completa' =>$data
            
        ]);

        return back();        // return view('class_dashboard');
    }

}
