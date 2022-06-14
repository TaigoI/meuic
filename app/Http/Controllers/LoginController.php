<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function makeSession(){
        session()->put('ID', '12345');

        return $this->index();
    }

    public function removeSession(){
        session()->remove('ID');
        return redirect('');
    }

    public function index(){
        return view('main_dashboard');
    }
}