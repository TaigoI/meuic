<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use Illuminate\Support\Facades\DB;

class MainDashboardController extends Controller
{
    public function index(){
        $disciplinas = DB::select('select modulos.modulo, disciplinas.id_disciplina, disciplinas.name_disciplina from modulos, disciplinas where modulos.id_disciplina = disciplinas.id_disciplina order by modulo ASC');
        return view('main_dashboard', compact('disciplinas'));
    }

}