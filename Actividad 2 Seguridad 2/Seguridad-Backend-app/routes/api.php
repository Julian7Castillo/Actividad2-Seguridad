<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando']);
});


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // obtener usuario autenticado (para dashboard)
    Route::get('/user', function () {
        return auth()->user();
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