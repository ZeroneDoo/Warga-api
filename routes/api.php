<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('/warga', WargaController::class);

Route::controller(AuthController::class)->group(function(){
    Route::post('/auth/register', 'register')->name('post.register');
    Route::post('/auth/login', 'login')->name('post.login');

    Route::group(['middleware' => ['auth:sanctum']], function(){
        Route::get('auth/warga', 'warga');
        Route::post('auth/logout', 'logout');
    });
});