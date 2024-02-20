<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ValidasiPetugasController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'false')->where('role', 'petugas')->get();

        return view('admin.pages.managementpetugas.validasi', ['users' => $users]);
    }

    public function validasi($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'true';
        $user->save();
        if ($user == null) {
            return response()->json(['errors' => 'error'], 422);
        }
        return response()->json([
            'data' => $user,
            'message' => 'SUCCESS',
        ]);
    }

    public function destroy($id)
    {
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
