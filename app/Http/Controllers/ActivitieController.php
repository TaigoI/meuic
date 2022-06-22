<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use Illuminate\Http\Request;

class ActivitieController extends Controller
{
    //

    public function index(){
        // Retornar a lista de monitores
        $listaAtvs = Atividade::all();
        return view('manage_activitie',compact('listaAtvs'));
    }

    public function insert(Request $request){

        $nova_atv = new Atividade();
        //Botar o email do Auth aqui
        $nova_atv->id_monitor = 'teste1@gmail.com';
        $nova_atv->desc_atividade = $request->get('desc_atividade');
        
        $data = $request->get('data');
        $array = list($year,$month,$day)=explode("-", $data);
        $nova_atv->dia_atividade = $array[2];
        $nova_atv->mes_atividade = $array[1];
        $nova_atv->ano_atividade = $array[0];
        

        $tempo = $request->get('tempo_gasto');
        $array = list($hour,$minute)=explode(":", $tempo);
        $array[0] = $array[0] * 60;
        $nova_atv->tempo_gasto = $array[0] + $array[1];

        //Aprender a tratar o save
        $nova_atv->save();

        $result = (['retorno'=>'Atividade registrada']);
       
        return view('class_dashboard', $result);
    }


}
