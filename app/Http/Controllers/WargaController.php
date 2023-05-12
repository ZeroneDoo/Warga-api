<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use App\Http\Requests\WargaRequest;
use Illuminate\Support\Facades\Hash;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data_warga = Warga::all(); 

        return response()->json([
         'success' => true,
         'message' => 'Data Warga',
         'data' => $data_warga,
        ], 200);
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
        $validatedData = $request->messages();
        return dd($validatedData);


        $warga = new Warga;
        $user->no_ktp = $validated['no_ktp'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->save();

        return response()->json([
         'success' => true,
         'message' => 'Data Berhasil Ditambahkan',
         'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Warga::find($id);
        
        return response()->json([
         'success' => true,
         'message' => 'Data id',
         'data yang terhapus' => $hapus_warga,
        ], 200);
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
        $hapus_warga = Warga::find($id);

        $hapus_warga->delete();

        return response()->json([
         'success' => true,
         'message' => 'Data Berhasil dihapus',
         'data yang terhapus' => $hapus_warga,
        ], 200);
    }
}
