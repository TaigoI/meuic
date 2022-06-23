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

		if(!Auth::user()->matricula){
			return redirect('/profile');
		} else {
			return redirect('/home');
		}

	}

	public function logOut()
	{
        Session::flush();

        Auth::logout();
        return redirect('/home');
	}

}
