<?php

namespace App\Services;

use App\SocialAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialGoogleAccountService {
    public function createOrGetUser(ProviderUser $providerUser) {
        // We will check if there is already social account from google login
        $account = SocialAccount::where('provider', 'google')->where('provider_user_id', $providerUser->getId())->first();

        if ($account) {
            // if there is, just return the record that belongs to the social account
            return $account->user;
        } else {
            // if there is none, create new social account
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'google',
                'image' => $providerUser->getAvatar(),
            ]);
    
            // We will find same email adress with the socil account
            $user = User::where('email', $providerUser->getEmail())->first();      
            
            // if there is none, we create user record for the social account in users_table
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName()
                ]);
            }
            
            // we have to connect users to social account (relationship)
            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}