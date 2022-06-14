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
}
