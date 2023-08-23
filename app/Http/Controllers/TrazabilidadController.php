<?php

namespace App\Http\Controllers;

use App\Models\Trazabilidad;
use App\Models\PuntoDeControl;
use App\Http\Requests\StoreTrazabilidadRequest;
use App\Http\Requests\UpdateTrazabilidadRequest;

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
        $trazabilidad = Trazabilidad::with("model")->get();
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
        // $data = $request->validate([
        //     'model_type' => 'required|string',
        //     'model_id' => 'required|integer',
        //     'recibido_por' => 'required|string',
        //     'entregado_por' => 'required|string',
        //     'url_informe' => 'nullable|string',
        // ]);

        // // Crea una nueva instancia de Trazabilidad con los datos validados
        // $puntoDeControl = PuntoDeControl::first(); // Por ejemplo, obtén el primer punto de control

        // // Crea una nueva instancia de Trazabilidad con los datos validados
        // $trazabilidad = new Trazabilidad($data);
        // $trazabilidad->punto_de_control_id = $puntoDeControl->id;
        // $trazabilidad->save();

        // return $trazabilidad;

        try {
            // ... (otras validaciones si es necesario)
    
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
    
            // ... (más lógica si es necesario)
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
        $trazabilidad = Trazabilidad::where('model_id', $id)->first();

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
