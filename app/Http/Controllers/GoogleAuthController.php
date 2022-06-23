<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')
			//->setScopes([''])
			->redirect();
    }

	private function isUserSignedIn($email){
		if(User::find($email) == null){
			return false;
		}
		else{
			return true;
		}
	}

	public function handleCallback()
	{
		$googleUser = Socialite::driver('google')->user();

		$user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
				'google_id' => $googleUser->getId(),
				'name' => $googleUser->getName(),
				'email' => $googleUser->getEmail(),
				'picture' => $googleUser->getAvatar(),
			],
        );

		Auth::login($user, $remember = true);
		if (!$this->isUserSignedIn( $googleUser->getEmail())){
			$page_title = ["page_title" => "Complete seu cadastro"];
		return view('complete_profile', compact('page_title'));
		} else{
			return redirect('/');
		}		
	}

	public function logOut()
	{
        Session::flush();

        Auth::logout();
        return redirect('/home');
	}
}
