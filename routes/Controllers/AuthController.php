<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public $google_id;
    function index(){
        return view('auth.login');
    }

    function redirect(){
        return Socialite::driver('google')->redirect();
    }

    function callback(){
    $user = Socialite::driver('google')->stateless()->user();
    $id=$user->id;
    $this->google_id=$id;
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
                return redirect()->route('dashboardpetugas')->with("success","Berhasil Login");
            }
            return redirect()->route('dashboardadmin')->with("success","Berhasil Login");
        }
        else{
            $users=User::updateOrCreate(
            [
                'email' => $email,
                'name' => $name,
                'google_id' => $id,
                'role'=>"petugas"
            ]);
             return view('auth.complitedata');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/')->with('success','Berhasil Logout');
    }

    public function compliteAdd(Request $request)
    {
        $request->validate([
        'phone' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'nik' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($this->google_id);
        $user->phone = $request->phone;
        $user->alamat = $request->alamat;
        $user->nik = $request->nik;
        $user->password=Hash::make($request->password);
        $user->save();
        Auth::login($user);
        if ($user->role == "petugas") {
            return redirect()->route('dashboardpetugas')->with("success", "Berhasil Login");
        }
        return redirect()->route('dashboardadmin')->with("success", "Berhasil Login");
    }
}
