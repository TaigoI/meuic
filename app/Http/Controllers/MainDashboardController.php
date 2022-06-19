<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Modulo;
use Illuminate\Support\Facades\DB;

class MainDashboardController extends Controller
{
    public function index(){
        /* $disciplinas = DB::select('select modulos.modulo, disciplinas.id_disciplina, disciplinas.name_disciplina from modulos, 
                                    disciplinas where modulos.id_disciplina = disciplinas.id_disciplina order by modulo ASC');
         */
        //dd($disciplinas);
        
        $query = Modulo::addSelect(['name_disciplina' => Disciplina::select('name_disciplina')
            ->whereColumn('modulos.id_disciplina', 'disciplinas.id_disciplina')
        ])->orderBy('modulo', 'ASC')->get();
        
        $disciplinas = collect();

        foreach ($query as $item) {            
            $disciplinas->put($item->modulo, collect());           
        }

        foreach ($query as $item) {            
            $disciplinas[$item->modulo]->put($item->id_disciplina, $item->name_disciplina);           
        } 
        
        return view('main_dashboard', compact('disciplinas'));
    }


    /* apagar dps */
    public function eloquentTest(){

        $query = Modulo::addSelect(['name_disciplina' => Disciplina::select('name_disciplina')
            ->whereColumn('modulos.id_disciplina', 'disciplinas.id_disciplina')
        ])->orderBy('modulo', 'ASC')->get();

        /* foreach ($query as $disciplina) {
            dump($disciplina->modulo);      
            dump($disciplina->name_disciplina);
            dump($disciplina->id_disciplina);     
        } */
        
        
        /* $array = collect([
            '1 periodo' => [
                'CSE',
                'P1',
                'CDI'
            ] ,

            '2 periodo' => [
                'ED',
                'GA',
                'IDK'
            ]
        ]);

        
         */
        
        $array = collect();
        foreach ($query as $item) {            
            $array->put($item->modulo, collect());           
        }

        foreach ($query as $item) {            
            $array[$item->modulo]->put($item->id_disciplina, $item->name_disciplina);           
        } 

        /* dump($array);
        dump($array["1º PERIODO"]);
        dump($array["2º PERIODO"]);
        */
        

        foreach($array->keys() as $modulo){
            dump(count($array[$modulo]->keys()));

            foreach($array[$modulo]->keys() as $id_disciplina){
                dump($modulo ." - ". $id_disciplina ." - ". $array[$modulo][$id_disciplina]);
            }
        }
        
        /* foreach (Disciplina::all() as $disciplina){
            dump($disciplina);
            dump($disciplina->id_disciplina);
            dump($disciplina->name_disciplina);
            dump($disciplina->id_modulo);
        } */

        


        /* $modulos = Modulo::all();
        dump($modulos); */

      /*   $res = Disciplina::find('COMP360');
        dd($res->modulos);
        
        $res = Modulo::find('175');
        dd($res->disciplinas); */
    }

}