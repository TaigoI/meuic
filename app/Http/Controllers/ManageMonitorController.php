<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Monitores;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Queue\Monitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseStatusCodeSame;

class ManageMonitorController extends Controller
{
    //
    public function index(){

        if(!Auth::user()){
			return redirect('/home');
		}
        if(Auth::user()->user_role == 'M' or Auth::user()->user_role == 'S'){
			return redirect('/home');
        }
        
        session()->put('idDisc', null);
        $listadisciplinas =  $this->getListaDisciplinas();
        
        return view('manage_monitor', compact('listadisciplinas'));
    }   

    private function getListaDisciplinas(){
        $listadisciplinas = Disciplina::all();

        return $listadisciplinas;
    }

    public function getMonitoresDisciplina(Request $request){
        $idDisc = $request->disciplinaSelect;
        session()->put('idDisc', $idDisc);
        // Retorna um array de arrays com as informações dos monitores de uma dada disciplina
        // As informações serão: name, email, picture
        $listaMonitores = Disciplina::find(strtoupper($idDisc))->monitor;
        $listaInfos = array();
        foreach ($listaMonitores as $userMonitor){
            $usuario = User::find($userMonitor->id_aluno);
            $listaUserInfo = array("name"=>$usuario->name,"email"=>$usuario->email,"picture"=>$usuario->picture);
            array_push($listaInfos,$listaUserInfo);
        }
        //dd($listaInfos);
        
        $listadisciplinas = $this->getListaDisciplinas();
        
        return view('manage_monitor', compact('listaInfos', 'listadisciplinas'));
    }

    public function getUserByEmail($email){
        /* 
        Esse daqui vai ser para a parte de busca, vai retornar as informacoes de um usuario
        de acordo com o email dele. 
        */        
        $usuario = User::find($email);

        if($usuario != null){
            //Se o usuário existir e não for email, então ele é retornado na pesquisa
            if($usuario->user_role == 'S'){
                $usuarioInfo = array("name"=>$usuario->name,"email"=>$usuario->email,"picture"=>$usuario->picture);
                return $usuarioInfo;
            }  
            else{
                //session()->now('warning', 'Esse aluno já é monitor de outra disciplina. Remova-o dela primeiro.'); 
                return ["ME", Monitores::where('id_aluno', $usuario->email)->first()];            
            }            
        } 
        else{
           // session()->now('issue', 'Esse usuário não existe.');
           return ["NE"];            
        }
        
    }

    // Excluir monitor
    public function destroy($email){
        $user = User::find($email);
        $user->update(["user_role" => 'S']);

        $updated = Monitores::where('id_aluno', $email)->delete();

        //$listadisciplinas = $this->getListaDisciplinas();
        if($updated){session()->flash('success', 'Monitor removido com sucesso!');}
        else{session()->flash('error', 'Opa! Algo deu errado. Tente de novo mais tarde.');}
        
        return redirect('/disciplinas');
    }

    // Add monitor
    public function insert($email, $id_disciplina){
        
        $user = User::find($email);
        $user->update(["user_role" => 'M']);
        
        $updated = Monitores::create([
            "id_aluno" => $email,
            "id_disciplina" => $id_disciplina
        ]);

        if($updated){session()->flash('success', 'Monitor adicionado com sucesso!');}
        else{session()->flash('error', 'Opa! Algo deu errado. Tente de novo mais tarde.');}
    }
}
