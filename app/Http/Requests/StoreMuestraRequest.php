<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Paciente;

class StoreMuestraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "nombre" => ["string"],
            "apellido" => ["string"],
            "obra_social" => ["string"],
            "dni" => ["integer","numeric"],
  
            "subtipo_muestra" => ["string","required"],
            "punto_generacion" => ["string","required"],
            "material" => ["string","required"],
            "localizacion" => ["string","required"],
            "diagnostico" => ["string","required"],
            "observaciones" => ["string","required"],
            "frascos" => ["integer","numeric","required"],
            "tipo_muestra_id" => ["integer","numeric","required"],
        ];
    }
}
