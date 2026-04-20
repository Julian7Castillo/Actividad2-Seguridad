<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Passport\Http\Middleware\CheckTokenForAnyScope;

Route::post('/login', [AuthController::class, 'login']);

//['auth:api',CheckTokenForAnyScope::using('user:read')]
Route::middleware(['auth:api',CheckTokenForAnyScope::using('user:read')])->group(function () {

    // obtener usuario autenticado (para dashboard)
    Route::get('/user', function () {
        return auth()->user();
    });

    Route::get('/users', function () {
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
//['auth:api', CheckTokenForAnyScope::using('admin:all')]
Route::middleware(['auth:api', CheckTokenForAnyScope::using('admin:all')])->group(function () {
    Route::post('/registro', [AuthController::class, 'register']);
});
