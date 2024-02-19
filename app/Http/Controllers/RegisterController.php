<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function index_complete($id)
    {
        return view('auth.complitedata')->with('id', $id);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan' => ['required', 'string', 'max:255'],
            'nama_belakang' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:8'],
            'alamat' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }

        $fullname = $request->nama_depan . ' ' . $request->nama_belakang;
        $user = User::create([
            'name' => $fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'role' => 'petugas',
        ]);

        return redirect()->route('login')->with('status', 'akun belum aktif, silahkan hubungi admin');
    }

    public function compliteAdd(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'numeric'],
            'alamat' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('register.complete', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('google_id', $id)->firstOrFail();
        $user->phone = $request->phone;
        $user->alamat = $request->alamat;
        $user->save();

        if ($user->status == 'false') {
            return redirect()->route('login')->with('status', 'akun belum aktif, silahkan hubungi admin');
        }
        Auth::login($user);
        return redirect()->route('dashboardpetugas')->with('success', 'Berhasil Login');
    }
}
