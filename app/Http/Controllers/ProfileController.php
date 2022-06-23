<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ProfileController extends Controller
{
    public function getView()
    {
        if(!Auth::user()){
			return redirect('/home');
		}

		return view('complete_profile');
    }

    public function updateProfile(Request $request){
        
        $matricula = $request->matriculaInput;
        $teacher_status = $request->teacherCheckbox;

        $user = User::find(Auth::user()->email);
        
        if($teacher_status != null){
            $updated = $user->update(["matricula" => $matricula, "teacher_status" => 'REQUESTED']);
        } else{
            $updated = $user->update(["matricula" => $matricula]);
        }

        if($updated){
            session()->flash('success', 'Informações atualizadas com sucesso!');
        }else{
            session()->flash('error', 'Opa! Algo deu errado. Tente de novo mais tarde.');
        }
        return redirect('/profile');
    }
}
