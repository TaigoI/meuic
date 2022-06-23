<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;

class ClassTimetableController extends Controller
{
    public function index($idDisciplina){      
        $disciplina = Disciplina::where('id_disciplina', $idDisciplina)->first();

		if($disciplina){
			return view('class_timetable', ['disciplina' => $disciplina]);
		} else {
			return redirect('/');
		}
    }

	public function notFound(){      
			return redirect('/');
    }
}
