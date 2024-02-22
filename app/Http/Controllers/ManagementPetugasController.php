<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ManagementPetugasController extends Controller
{
    public function index(){
        $users = User::where('status', 'true')->where('role', 'petugas')->get();
        return view('admin.pages.managementpetugas.index',['users' => $users]);
    }

      /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function toAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'admin';
        $user->save();
        if ($user == null) {
            return response()->json(['errors' => 'error'], 422);
        }
        return response()->json([
            'data' => $user,
           'message' => 'SUCCESS',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
     public function show($id)
    {
        $users = User::find($id);

        return response()->json($users);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
