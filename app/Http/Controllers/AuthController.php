<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    function callback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $id = $user->id;
        $email = $user->email;
        $name = $user->name;
        $validasi = User::where('email', $email)->count();
        $validPass = User::where('google_id', $id)->first();
        if ($validasi == 0) {
            $users = User::updateOrCreate([
                'email' => $email,
                'name' => $name,
                'google_id' => $id,
                'role' => 'petugas',
            ]);
            return redirect()->route('register.complete', ['id' => $id]);
        }
        if ($validPass == null) {
            return redirect()->route('login')->with('notnull', 'Akun tidak bisa login melalui google');
        }
        if ($validPass->alamat != null && $validPass->phone != null && $validasi != 0) {
            $users = User::updateOrCreate([
                'email' => $email,
                'name' => $name,
                'google_id' => $id,
            ]);
            if ($users->status == 'false') {
                return redirect()->route('login')->with('status', 'akun belum aktif, silahkan hubungi admin');
            }
            Auth::login($users);
            if ($users->role == 'petugas') {
                return redirect()->route('dashboardpetugas')->with('success', 'Berhasil Login');
            }
            return redirect()->route('dashboardadmin')->with('success', 'Berhasil Login');
        } else {
            return redirect()->route('register.complete', ['id' => $id]);
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Berhasil Logout');
    }

    public function loginform(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();
        if ($user == null) {
            return redirect()->route('login')->with('error', 'Email tidak di temukan');
        }

        if ($user->password != null) {
            if (Hash::check($request->password, $user->password)) {
                if ($user->status == 'false') {
                    return redirect()->route('login')->with('status', 'akun belum aktif, silahkan hubungi admin');
                } else {
                    Auth::login($user);
                    if ($user->role == 'admin') {
                        return redirect()->route('dashboardadmin')->with('success', 'Berhasil Login');
                    }
                    return redirect()->route('dashboardpetugas')->with('success', 'Berhasil Login');
                }
            } else {
                return redirect()->route('login')->with('error', 'Password salah');
            }
        } else {
            return redirect()->route('login')->with('notnull', 'Akun tidak bisa login melalui form login');
        }
    }
}
