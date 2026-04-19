<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/users', function () {
    return User::all();
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');



Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando']);
});


Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:api')->group(function () {

    // obtener usuario autenticado (para dashboard)
    Route::get('/user2', function () {
        return auth()->user();
    });

    Route::get('/users2', function () {
        return User::all();
    });

    // cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/dashboard', function () {
        return response()->json([
            'message' => 'Bienvenido al dashboard',
            'user' => auth()->user()
        ]);
    });

});

//Route::middleware()->group(function () {
    Route::post('/registro', [AuthController::class, 'registers']);
//});