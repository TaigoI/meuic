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

	public function update(Request $request)
    {
        $data = $request->all();
		$status = Auth::user()->teacher_status;

		if($status == "NO" && isset($data['checkbox'])){
			$status = "REQUESTED";
		}

		User::updateOrCreate(
			['email' => Auth::user()->email],
			[
				'matricula'      => $data['matricula'],
				'teacher_status' => $status,
			],
		);

		return redirect('/profile')->with('message', 'TESTE');
    }
}
