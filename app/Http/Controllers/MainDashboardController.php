<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Modulo;

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

}