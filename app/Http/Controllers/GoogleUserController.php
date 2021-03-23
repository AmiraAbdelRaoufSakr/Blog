<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Auth\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class GoogleUserController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect()->route("home");
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->route("posts.index");
    }

    private function findOrCreateUser($googleUser)
    {
        if ($authUser = User::where('google_account', $googleUser->email)->first()) {
            return $authUser;
        }

        return User::create([
            'github_account' => $googleUser->email,
            "name" => $googleUser->name,
            "email" => "not asigned email",
            "password" => "not asigned"
        ]);
    }
}
