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
        $users = User::where('google_id', $id)->first();
        return view('auth.complitedata',compact('users'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan' => ['required', 'string', 'max:255'],
            'nama_belakang' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:petugas'],
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
            $user_id = User::findOrFail($id);
            return redirect()
                ->route('register.complete', ['id' => $user_id->google_id])
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail($id);
        // if($user->phone!=null ){

        // }if($user->alamat!=null){

        // }
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
