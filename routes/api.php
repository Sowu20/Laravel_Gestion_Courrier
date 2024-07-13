<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AgentSCController;
use App\Http\Controllers\API\CourrierController;
use App\Http\Controllers\API\DestinataireController;
use App\Http\Controllers\API\ExpediteurController;
use App\Http\Controllers\API\UserController;

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

//Pour User //
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

//Pour Courrier //
Route::get('/courriers', [CourrierController::class, 'index']);
Route::get('/courriers/{id}', [CourrierController::class, 'show']);
Route::post('/courriers', [CourrierController::class, 'store']);
Route::put('/courriers/{id}', [CourrierController::class, 'update']);
Route::delete('/courriers/{id}', [CourrierController::class, 'delete']);

// Pour Destinataire //
Route::get('/destinataires', [DestinataireController::class, 'index']);
Route::get('/destinataires/{id}', [DestinataireController::class, 'show']);
Route::post('/destinataires', [DestinataireController::class, 'store']);
Route::put('/destinataires/{id}', [DestinataireController::class, 'update']);
Route::delete('/destinataires/{id}', [DestinataireController::class, 'delete']);

// Pour Expediteur //
Route::get('/expediteurs', [ExpediteurController::class, 'index']);
Route::get('/expediteurs/{id}', [ExpediteurController::class, 'show']);
Route::post('/expediteurs', [ExpediteurController::class, 'store']);
Route::put('/expediteurs/{id}', [ExpediteurController::class, 'update']);
Route::delete('/expediteurs/{id}', [ExpediteurController::class, 'delete']);

//Pour AgentSC //

Route::get('/agents', [AgentSCController::class, 'index']);
Route::get('/agents/{id}', [AgentSCController::class, 'show']);
Route::post('/agents', [AgentSCController::class, 'store']);
Route::put('/agents/{id}', [AgentSCController::class, 'update']);
Route::delete('/agents/{id}', [AgentSCController::class, 'delete']);