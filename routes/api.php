<?php

use App\Http\Controllers\CapacitacionesController;
use App\Http\Controllers\cursosController;
use App\Http\Controllers\NoticiasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('cursos', [cursosController::class, 'cursosApi']);

Route::get('noticias', [NoticiasController::class, 'noticiasApi']);
Route::get('detalle-noticias/{id}', [NoticiasController::class, 'detalleNoticiasApi']);

Route::get('capacitaciones', [CapacitacionesController::class, 'capacitacionesApi']);
