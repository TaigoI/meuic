<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Monitores;
use App\Models\User;
use Illuminate\Http\Request;

class ManageMonitorController extends Controller
{
    //
    public function index(){
        // Retornar a lista de disciplinas
        $listadisciplinas = Disciplina::all();
    

        /* 
        $query = Monitores::with('aluno')->get();
        $disciplina_monitor_map = collect();

        foreach ($query as $item) {            
            $disciplina_monitor_map->put($item->id_disciplina, collect());           
        }

        foreach ($query as $item) {            
            $disciplina_monitor_map[$item->id_disciplina]->push($item->aluno);           
        } */

        session()->put('idDisc', null);
        return view('manage_monitor', compact('listadisciplinas'));
    }

    private function getListaDisciplinas(){
        $listadisciplinas = Disciplina::all();

        return  $listadisciplinas;
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
        $usuarioInfo = array("name"=>$usuario->name,"email"=>$usuario->email,"picture"=>$usuario->picture);
        
        return $usuarioInfo;
    }

    // Excluir monitor
    public function destroy($email){
   
        Monitores::where('id_aluno',$email)->delete();

        //$listadisciplinas = $this->getListaDisciplinas();
        
        return redirect('/disciplinas');
    }

    // Add monitor
    public function insert($email, $id_disciplina){
        Monitores::create([
            "id_aluno" => $email,
            "id_disciplina" => $id_disciplina
        ]);
    }
    
}
