<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use App\Models\Paciente;
use App\Http\Requests\StoreMuestraRequest;
use App\Http\Requests\UpdateMuestraRequest;

use Illuminate\Http\Request;

class MuestraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $muestras = Muestra::get();
        return $muestras;
        // return view("muestras.index", compact("muestras"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $request;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMuestraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     // Validar los datos del paciente
     $pacienteValidado = $request->validate([
        "nombre" => "required",
        "apellido" => "required",
        "dni" => "required|numeric",
        "obra_social" => "required",
    ], [
        "required" => "Este campo es requerido", 
        "numeric" => "Este campo requiere números"
    ]);

    // Crear el paciente
    $paciente = new Paciente();
    $paciente->nombre = $pacienteValidado["nombre"];
    $paciente->apellido = $pacienteValidado["apellido"];
    $paciente->dni = $pacienteValidado["dni"];
    $paciente->obra_social = $pacienteValidado["obra_social"];
    $paciente->save();

    // Validar los datos de la muestra
    $muestraValidada = $request->validate([
        "subtipo_muestra_id" => "required",
        "punto_generacion" => "required",
        "material" => "required",
        "localizacion" => "required",
        "diagnostico" => "required",
        "observaciones" => "required",
        "frascos" => "required|numeric",
        "tipo_muestra_id" => "required|numeric",
    ], [
        "required" => "Este campo es requerido", 
        "numeric" => "Este campo requiere números"
    ]);

    // Crear la muestra asociada al paciente
    $muestraValidada['paciente_id'] = $paciente->id;
    Muestra::create($muestraValidada);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Muestra  $muestra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $muestra = Muestra::find($id);
        return $muestra;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Muestra  $muestra
     * @return \Illuminate\Http\Response
     */
    public function edit(Muestra $muestra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMuestraRequest  $request
     * @param  \App\Models\Muestra  $muestra
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMuestraRequest $request, Muestra $muestra)
    {
        $muestra->update($request->validated());
        
        return "datos de muestra actualizados";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Muestra  $muestra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Muestra $muestra)
    {
        $muestra->delete();
        return $muestra;
    }
}
