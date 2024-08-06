<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginGoogleController extends Controller
{

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try{
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id',$user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('/');
            } else {
                $existingUser = User::where('email', $user->email)->first();
                if ($existingUser) {
                    $existingUser->update([
                        'google_id' => $user->id
                    ]);
                    Auth::login($existingUser);
                } else {
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'password' => bcrypt('123123123') 
                    ]);
                    Auth::login($newUser);
                }
                return redirect()->intended('/');
            }
        }catch (Exception $e){
            dd($e->getMessage());
        }
    }
  
}
