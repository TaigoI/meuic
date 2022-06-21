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
		return redirect('/home');
	}

	public function logOut()
	{
        Session::flush();

        Auth::logout();
        return redirect('/home');
	}
}
