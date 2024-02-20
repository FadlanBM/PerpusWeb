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
        return response()->json([
            'data' => $user,
            'message' => 'SUCCESS'
        ]);
    }
}
