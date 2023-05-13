<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $response = [
        'message' => null,
        'data' => null
    ];

    public function register(RegisterRequest $request)
    {
        $data = Warga::create([
            'email' => $request->email,
            'no_ktp' => $request->no_ktp,
            'password' => Hash::make($request->password),
        ]);

        $this->response['message'] = 'success';
        $this->response['data'] = $data;
        return response()->json($this->response,200);
    }

    public function login(LoginRequest $request)
    {
        $user = Warga::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'failed',
                'data' => '*Email atau Password salah!'
            ],400);
        }
        
        $token = $user->createToken($request->device_name)->plainTextToken; // membuat token untuk user

        $tokenWarga = explode("|", $token)[1];
        $user->update([
            'remember_token' => $tokenWarga
        ]); 

        $this->response['message'] = 'success';
        $this->response['data'] = ['token' => $token];

        return response()->json($this->response,200);
    }

    public function warga()
    {
        $user = Auth::user();

        $this->response['message'] = 'success';
        $this->response['data'] = $user;

        return response()->json($this->response,200);
    }
    
    public function logout()
    {
        $logout = auth()->user()->currentAccessToken()->delete();

        $this->response['message'] = 'success';

        return response()->json($this->response, 200);
    }
}
