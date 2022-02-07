<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\User;
class SocialLoginController extends Controller
{
    //
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function processLoginGoogle() {
        $googleUser = Socialite::driver('google')->user();
        if(!$googleUser){
            return;
        }

        $systemUser = User::where('google_id', $googleUser->id)->first();

        if(!$systemUser){
            $systemUser = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'role_id' => 2,
                'google_id' => $googleUser->id,
            ]);
        }
        Auth::login($systemUser, true);
        return redirect()->route('getHome');;
    }

    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }
    public function processLoginFacebook() {
        $facebookUser = Socialite::driver('facebook')->user();
        // dd($facebookUser);
    }
}
