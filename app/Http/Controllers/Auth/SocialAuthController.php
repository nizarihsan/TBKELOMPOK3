<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialAuthController extends Controller
{
    // Login or create a new account
    protected function loginOrCreateAccount($providerUser, $provider)
    {
        $user = User::where('email', $providerUser->getEmail())->first();

        if ($user) {
            Auth::login($user);
        } else {
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'password' => Hash::make(uniqid()),
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
            ]);

            Auth::login($user);
        }
    }
}