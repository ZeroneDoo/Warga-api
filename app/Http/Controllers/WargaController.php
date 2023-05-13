<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWargaRequest;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Http\Requests\WargaRequest;
use Illuminate\Support\Facades\Hash;

use function App\Helpers\costumValidate;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function store(WargaRequest $request)
    {
        $data = Warga::create([
            'email' => $request->email,
            'no_ktp' => $request->no_ktp,
            'password' => Hash::make($request->password),
        ]);

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
            'data yang terhapus' => $edit,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWargaRequest $request, $id)
    {
        $warga = Warga::find($id);

        $warga->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_telepon' => $request->no_telepon,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jk' => $request->jk
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Warga',
            'Data Berhasil di Ubah' => $warga,
        ], 200);
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
