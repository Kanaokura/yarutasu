<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialGoogleAccountService;
use App\Service\SocialTwitterAccountService;

class SocialAccountController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(SocialGoogleAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('google')->user());

        auth()->login($user);

        return redirect('/home');
    }

    public function redirectToTwitter()
    {
        return Socialite::driver('Twitter')->redirect();
    }

    public function handleTwitterCallback(SocialTwitterAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('Twitter')->user());
        
        auth()->login($user);

        return redirect('/home');
    }
}
