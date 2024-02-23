<?php

namespace App\Http\Controllers;

use App\Models\Katogory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class ManagementKategory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategory = Katogory::all();
        return view('petugas.pages.managementkategory', ['kategory' => $kategory]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|string|max:255|unique:kategori_bukus',
        ]);

        if ($validator->fails()) {
            return redirect()->route('managementkategory')->withErrors($validator)->withInput();
        }

        $kategory = new Katogory();
        $kategory->nama_kategori = $request->nama_kategori;
        $kategory->save();

        return redirect()->route('managementkategory')->with('success', 'Berhasil menambahkan kategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategory = Katogory::find($id);

        return response()->json($kategory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|string|max:255|unique:kategori_bukus',
        ]);

        if ($validator->fails()) {
            return redirect()->route('managementkategory')->withErrors($validator)->withInput();
        }

        $user = Katogory::findOrFail($id);
        $user->nama_kategori = $request->nama_kategori;
        $user->save();
        return response()->json(
            [
                'message' => 'SUCCESS',
            ],
            200,
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategory = Katogory::findOrFail($id);
        $kategory->delete();
        return response()->json([
            'message' => 'SUCCESS',
        ]);
    }
}
