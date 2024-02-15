<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    function index(){
        return view('auth.login');
    }

    function redirect(){
        return Socialite::driver('google')->redirect();
    }

    function callback(){
    $user = Socialite::driver('google')->stateless()->user();
    $id=$user->id;
    $email=$user->email;
    $name=$user->name;

    $validasi=User::where('email',$email)->count();
        if($validasi!=0){
           $users=User::updateOrCreate(
            [
                'email' => $email,
                'name' => $name,
                'google_id' => $id,
            ]);
            Auth::login($users);
            if($users->role=="petugas"){
                return redirect()->route('dashboardpetugas');
            }
            return redirect()->route('dashboardadmin');
        }
        else{
             return redirect('/')->with('error','Akun tidak terdaftar silahkan hubungi admin');
        }
    }
}
