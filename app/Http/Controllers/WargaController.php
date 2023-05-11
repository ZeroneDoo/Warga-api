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
         'message' => 'berhasil coy',
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
    public function store(WargaRequest $request)
    {
        // dd('ok');
        $data = Warga::create([        
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'no_ktp' => $request->no_ktp,
        ]);

        return response()->json([
         'success' => true,
         'message' => 'Data Tersimpan',
         'data' => $request->all(),
        ], 200);
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
        $hapus_warga = Warga::find($id);

        $hapus_warga->delete();

        return response()->json([
         'success' => true,
         'message' => 'Data telah dihapus',
         'data yang terhapus' => $hapus_warga,
        ], 200);
    }
}
