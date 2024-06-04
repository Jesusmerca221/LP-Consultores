<?php

use App\Http\Controllers\CapacitacionesController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemasController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\vistasController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\ComprobanteController;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Rutas de configuracion

Route::get('storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link created!';
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
    Artisan::call('db:seed');
    return "Migraciones y seeders realizados correctamente";
});

Route::get('/migrateyseeder', function () {
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
    return "Migraciones y seeders realizados correctamente";
});
////////////////////////////////////


Route::get('/', [vistasController::class, 'welcome']);

Route::get('/dashboard', [vistasController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    Route::resource('Usuarios', UsersController::class);
    Route::get('/cursos-estudiante', [UsersController::class, 'cursosEstudiante'])->name('cursosEstudiante');

    Route::resource('Compras', ComprasController::class);
    Route::resource('Noticias', NoticiasController::class);
    Route::resource('Clientes', ClientesController::class);
    Route::resource('Cursos', CursosController::class);
    Route::resource('Capacitaciones', CapacitacionesController::class);
    Route::resource('Cuentas', CuentaController::class);
    Route::resource('Comprobante', ComprobanteController::class);
});

require __DIR__ . '/auth.php';
