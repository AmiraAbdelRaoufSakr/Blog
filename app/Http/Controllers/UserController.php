<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Auth\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (Exception $e) {
            return redirect()->route("home");
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->route("posts.index");
    }

    private function findOrCreateUser($githubUser)
    {
        if ($authUser = User::where('github_account', $githubUser->email)->first()) {
            return $authUser;
        }

        return User::create([
            'github_account' => $githubUser->email,
            "name" => $githubUser->nickname,
            "email" => "not asigned",
            "password" => "not asigned"
        ]);
    }
}
