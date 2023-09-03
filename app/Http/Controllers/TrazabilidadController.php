<?php

namespace App\Http\Controllers;

use App\Models\Trazabilidad;
use App\Models\PuntoDeControl;
use App\Http\Requests\StoreTrazabilidadRequest;
use App\Http\Requests\UpdateTrazabilidadRequest;
use App\Models\Muestra;
use Illuminate\Http\Request;

class TrazabilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trazabilidad = Trazabilidad::with('puntoDeControl')->get();
        return $trazabilidad;
    }

    public function indexMuestra($id)
    {
        $trazabilidad = Muestra::find($id)->trazabilidades;
        return $trazabilidad;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrazabilidadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
    
            // Obtener el último punto_de_control_id
            $lastPuntoDeControlId = Trazabilidad::where('model_id', $request->input('model_id'))
                ->max('punto_de_control_id');
            $newPuntoDeControlId = $lastPuntoDeControlId + 1;
    
            // Crear la nueva trazabilidad con valores del request
            $nuevaTrazabilidad = new Trazabilidad();
            $nuevaTrazabilidad->model_type = "App\Models\Muestra";
            $nuevaTrazabilidad->model_id = $request->input('model_id');
            $nuevaTrazabilidad->punto_de_control_id = $newPuntoDeControlId;
            $nuevaTrazabilidad->recibido_por = $request->input('recibido_por'); // Obtener el valor del request
            $nuevaTrazabilidad->entregado_por = $request->input('entregado_por'); // Obtener el valor del request
            // ... (otros valores de trazabilidad aquí)
            $nuevaTrazabilidad->save();
    
            return $nuevaTrazabilidad;
    
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trazabilidad  $trazabilidad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trazabilidad = Trazabilidad::where('model_id', $id)
        ->orderBy('created_at', 'desc') // Ordena por fecha de creación en orden descendente
        ->first();

        if ($trazabilidad) {
            return $trazabilidad;
        } else {
            return response()->json(['message' => 'Trazabilidad no encontrada'], 404);
        }$trazabilidad = Trazabilidad::find($id);
        return $trazabilidad;
    }

    public function showByModelAndPuntoDeControl($modelId, $puntoDeControlId)
    {
        $trazabilidad = Trazabilidad::where('model_id', $modelId)
            ->where('punto_de_control_id', $puntoDeControlId)
            ->first();
    
        if ($trazabilidad) {
            return $trazabilidad;
        } else {
            return response()->json(['message' => 'Trazabilidad no encontrada'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trazabilidad  $trazabilidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Trazabilidad $trazabilidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrazabilidadRequest  $request
     * @param  \App\Models\Trazabilidad  $trazabilidad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrazabilidadRequest $request, Trazabilidad $trazabilidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trazabilidad  $trazabilidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trazabilidad $trazabilidad)
    {
        //
    }
}
