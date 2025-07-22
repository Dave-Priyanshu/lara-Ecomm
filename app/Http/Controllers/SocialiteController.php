<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function authProviderRedirect($provider){
        // dd($provider);
        if($provider){
            
            return Socialite::driver($provider)->redirect();
        }else
        {
            abort(404);
        }
    }

    public function socialAuthentication($provider){
    try{
        // dd($provider);
        if($provider){

            $socialUser = Socialite::driver($provider)->user();
            // dd($socialUser);
    
            $user = User::where('auth_provider_id',$socialUser->id)->first();
    
            if($user){
                Auth::login($user);
            }
            else{
                $userData = User::create([
                    'name'=>$socialUser->name,
                    'email'=>$socialUser->email,
                    'password'=> Hash::make('test@123'),
                    'auth_provider_id'=>$socialUser->id,
                    'auth_provider' => $provider,
                    ]);
                if($userData){
                    Auth::login($userData);
                }
            }
            return redirect()->route('home');
        }
        abort(404);
    }catch(Exception $e){
            dd($e);
        }
        
    }
}
