<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProxyController;

use App\Http\Controllers\ModuleProxyController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return response()->json(['message' => 'Gatway API is working ✅']);
});


Route::post('/register', [ProxyController::class, 'register']);
Route::post('/login', [ProxyController::class, 'login']);


Route::prefix('auth-modules')->group(function () {
    Route::get('/', [ModuleProxyController::class, 'index']);
    Route::post('/', [ModuleProxyController::class, 'store']);
    Route::put('/{id}', [ModuleProxyController::class, 'update']);
    Route::delete('/{id}', [ModuleProxyController::class, 'destroy']);
});


