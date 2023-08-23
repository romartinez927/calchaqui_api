<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use App\Models\Paciente;
use App\Models\Trazabilidad;
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
        $muestras = Muestra::with('paciente', 'tipoMuestra', 'subtipoMuestra')->get();
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
        try {
             // Validar los datos del paciente
            $validacion = $request->validate([
                "nombre" => "required",
                "apellido" => "required",
                "dni" => "required|numeric",
                "obra_social" => "required",
                "subtipo_muestra_id" => "required",
                "punto_generacion" => "required",
                "material" => "required",
                "localizacion" => "required",
                "diagnostico" => "required",
                "medico" => "required",
                "preparador" => "required",
                "observaciones" => "required",
                "frascos" => "required|numeric",
                "tipo_muestra_id" => "required|numeric",
            ], [
                "required" => "Este campo es requerido", 
                "numeric" => "Este campo requiere números"
            ]);

            // Buscar si ya existe un paciente con el mismo DNI
            $pacienteExistente = Paciente::where('dni', $validacion['dni'])->first();

            // Si el paciente ya existe, utiliza ese paciente
            if ($pacienteExistente) {
                $paciente = $pacienteExistente;
            } else {
                // Si no existe, crea un nuevo paciente
                $paciente = new Paciente();
                $paciente->nombre = $validacion["nombre"];
                $paciente->apellido = $validacion["apellido"];
                $paciente->dni = $validacion["dni"];
                $paciente->obra_social = $validacion["obra_social"];
                $paciente->save();
            }
            // Crear la muestra asociada al paciente
            $validacion['paciente_id'] = $paciente->id;
            $muestra = Muestra::create($validacion);

            $trazabilidad = new Trazabilidad();
            $trazabilidad->model_type = Muestra::class; // Nombre de la clase del modelo Muestra
            $trazabilidad->model_id = $muestra->id;
            $trazabilidad->punto_de_control_id = 1;
            $trazabilidad->recibido_por = $validacion['preparador'];
            $trazabilidad->entregado_por = $validacion['medico'];
            // ... (otros valores de trazabilidad aquí)
            $trazabilidad->save();

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
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
        $paciente = $muestra->paciente; // Suponiendo que tienes una relación definida en el modelo
        $tipoMuestra = $muestra->tipoMuestra;
        $subtipoMuestra = $muestra->subtipoMuestra;

        return response()->json([
            'muestra' => $muestra,
            'paciente' => $paciente,
            'tipo_muestra' => $tipoMuestra,
            'subtipo_muestra' => $subtipoMuestra,
        ]);
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
