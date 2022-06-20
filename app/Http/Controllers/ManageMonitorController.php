<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Monitores;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ManageMonitorController extends Controller
{
    //
    public function index(){
        // Retornar a lista de disciplinas
        $listadisciplinas = Disciplina::all();
        return view('manage_disciplina',compact('listadisciplinas'));
        
    }

    public function getMonitoresDisciplina($idDisc){

        // Retorna um array de arrays com as informações dos monitores de uma dada disciplina
        // As informações serão: name, email, picture
        $listaMonitores = Disciplina::find(strtoupper($idDisc))->monitor;
        $listaInfos = array();
        foreach ($listaMonitores as $userMonitor){
            $usuario = User::find($userMonitor->id_aluno);
            $listaUserInfo = array("name"=>$usuario->name,"email"=>$usuario->email,"picture"=>$usuario->picture);
            array_push($listaInfos,$listaUserInfo);
        }
        return $listaInfos;
    }

    public function getUserByEmail($email){
        /* 
        Esse daqui vai ser para a parte de busca, vai retornar as informacoes de um usuario
        de acordo com o email dele. 
        */
        
        $usuario = User::find($email);
        $usuarioInfo = array("name"=>$usuario->name,"email"=>$usuario->email,"picture"=>$usuario->picture);
        return $usuarioInfo;
    }

    // Excluir monitor
    public function destroy($email){
        Monitores::where('id_aluno',$email)->delete();
    }

    // Add monitor
    public function insert($email,$id_disciplina){
        Monitores::create([
            "id_aluno" => $email,
            "id_disciplina" => $id_disciplina
        ]);
    }



    
}
