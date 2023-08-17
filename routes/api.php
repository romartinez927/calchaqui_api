<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\ClinicaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\PuntoDeControlController;
use App\Http\Controllers\TipoMuestraController;
use App\Http\Controllers\SubtipoMuestraController;
use App\Http\Controllers\ObraSocialController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resources([
    "muestra" => MuestraController::class,
    "paciente" => PacienteController::class,
    "tipo_muestra" => TipoMuestraController::class
]);

Route::get("/test-relaciones", function() {
    return "hola";
});

Route::get("/pacientes", [PacienteController::class, "index"]);
Route::get("/pacientes/{id}", [PacienteController::class, "show"]);
Route::post('/pacientes', [PacienteController::class, "store"]);
Route::patch("/pacientes/{paciente}", [PacienteController::class, "update"]);
Route::delete("/pacientes/{id}", [PacienteController::class, "destroy"]);

Route::get("/muestras", [MuestraController::class, "index"]);
Route::get("/muestras/{id}", [MuestraController::class, "show"]);
Route::post('/muestras', [MuestraController::class, "store"]);
Route::patch("/muestras/{muestra}", [MuestraController::class, "update"]);
Route::delete("/muestras/{muestra}", [MuestraController::class, "destroy"]);

Route::get("/clinicas", [ClinicaController::class, "index"]);
Route::get("/clinicas/{clinica}", [ClinicaController::class, "show"]);
Route::post('/clinicas', [ClinicaController::class, "store"]);
Route::patch("/clinicas/{clinica}", [ClinicaController::class, "update"]);
Route::delete("/clinicas/{clinica}", [ClinicaController::class, "destroy"]);

Route::get("/servicios", [ServicioController::class, "index"]);
Route::get("/servicios/{servicio}", [ServicioController::class, "show"]);
Route::post('/servicios', [ServicioController::class, "store"]);
Route::patch("/servicios/{servicio}", [ServicioController::class, "update"]);
Route::delete("/servicios/{servicio}", [ServicioController::class, "destroy"]);

Route::get("/puntos-de-control", [PuntoDeControlController::class, "index"]);
Route::get("/puntos-de-control/{punto-de-control}", [PuntoDeControlController::class, "show"]);
Route::post('/puntos-de-control', [PuntoDeControlController::class, "store"]);
Route::patch("/puntos-de-control/{punto-de-control}", [PuntoDeControlController::class, "update"]);
Route::delete("/puntos-de-control/{punto-de-control}", [PuntoDeControlController::class, "destroy"]);

Route::get("/tipo-muestras", [TipoMuestraController::class, "index"]);
Route::get("/tipo-muestras/{tipo-muestra}", [TipoMuestraController::class, "show"]);
Route::post('/tipo-muestras', [TipoMuestraController::class, "store"]);
Route::patch("/tipo-muestras/{tipo-muestra}", [TipoMuestraController::class, "update"]);
Route::delete("/tipo-muestras/{tipo-muestra}", [TipoMuestraController::class, "destroy"]);

Route::get("/subtipo-muestras", [SubtipoMuestraController::class, "index"]);
Route::get("/subtipo-muestras/{subtipo}", [SubtipoMuestraController::class, "show"]);
Route::post('/subtipo-muestras', [SubtipoMuestraController::class, "store"]);
Route::patch("/subtipo-muestras/{subtipo}", [SubtipoMuestraController::class, "update"]);
Route::delete("/subtipo-muestras/{subtipo}", [SubtipoMuestraController::class, "destroy"]);

Route::get("/obra-social", [ObraSocialController::class, "index"]);
Route::get("/obra-social/{obraSocial}", [ObraSocialController::class, "show"]);
