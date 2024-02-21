<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileAkunController extends Controller
{
    public function index()
    {
        return view('admin.pages.profile.index');
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
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->alamat=$request->alamat;
        $user->save();
        Auth::login($user);
         return redirect()->route('profile.petugas')->with('success', 'Berhasil update profile');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        if ($user == null) {
            return response()->json(['errors' => 'error'], 422);
        }
        return response()->json([
            'data' => $user,
            'message' => 'SUCCESS',
        ]);
    }
}
