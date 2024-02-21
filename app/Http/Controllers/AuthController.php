<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    function index()
    {
        return response()->view('auth.login')->header('Cache-Control', 'no-store');
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
        $img = $user->avatar;
        $validasi = User::where('email', $email)->count();
        $validasiid = User::where('google_id', $id)->first();
        if ($validasi == 0) {
            $filename = $id .'.jpg';
            $path = Storage::putFileAs('profile', $img, $filename);
            $img_file = basename($path);
            $users = User::updateOrCreate([
                'email' => $email,
                'name' => $name,
                'google_id' => $id,
                'img' => $img_file,
            ]);
            return redirect()->route('register.complete', ['id' => $id]);
        }
        if ($validasiid == null) {
            return redirect()->route('login')->with('notnull', 'Akun tidak bisa login melalui google');
        }
        if ($validasiid->alamat != null && $validasiid->phone != null && $validasi != 0) {
            $filename = $id . '.jpg';
            $path = Storage::putFileAs('profile', $img, $filename);
            $img_file = basename($path);
            $users = User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'google_id' => $id,
                    'img' => $img_file,
                ],
            );
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
