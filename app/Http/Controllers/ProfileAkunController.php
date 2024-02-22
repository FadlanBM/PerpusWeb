<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileAkunController extends Controller
{
    public function index()
    {
        return view('auth.profile.index');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'alamat' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.petugas')->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->alamat = $request->alamat;
        $user->save();
        Auth::login($user);
        return redirect()->route('profile.petugas')->with('success', 'Berhasil update profile');
    }

    public function destroy($id)
    {

            $user = User::findOrFail($id);

            $imagePath = $user->img;

            $imagePath = 'profile/' . $imagePath;

            Storage::delete($imagePath);

            $user->delete();

            Auth::logout();

            return response()->json([
                'message' => 'SUCCESS',
            ]);
        
    }
    public function resetPass(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pass_old' => 'required|string|max:255|min:8',
            'password_new' => 'required|string|max:255|confirmed|min:8',
            'password_new_confirmation' => 'required|string|max:255|min:8',
        ]);

        if ($validator->fails()) {
            $user_id = User::findOrFail($id);
            return redirect()->route('profile.petugas')->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        if (Hash::check($request->pass_old, $user->password)) {
            $user->password = bcrypt($request->password_new);
            $user->save();
            Auth::login($user);
            return redirect()->route('profile.petugas')->with('success', 'Berhasil update password');
        } else {
            return redirect()
                ->route('profile.petugas')
                ->withErrors(['pass_old' => 'Password salah'])
                ->withInput();
        }
    }
}
