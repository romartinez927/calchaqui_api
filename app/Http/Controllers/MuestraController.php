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
    public function store(StoreMuestraRequest $request)
    {
        $paciente = Paciente::create($request->validated());
        
        // Muestra::create($request->validate());

        Muestra::create([
            "paciente_id" => $paciente->id,
            "subtipo_muestra" => $request->subtipo_muestra,
            "punto_generacion" => $request->punto_generacion,
            "material" => $request->material,
            "localizacion" => $request->localizacion,
            "diagnostico" => $request->diagnostico,
            "observaciones" => $request->observaciones,
            "frascos" => $request->frascos,
            "tipo_muestra_id" => $request->tipo_muestra_id,
        ]);
        
        return "muestra creada";

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
