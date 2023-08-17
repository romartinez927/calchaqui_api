<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateObraSocialRequest extends FormRequest
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
            "rnos" => ["boolean"],
            "nombre" => ["string","required"],
            "sigla" => ["string","required"],
            "domicilio" => ["string"],
            "cp" => ["integer","numeric"],
            "provincia" => ["string"],
            "e_mail" => ["string"],
            "telefono" => ["integer","numeric"],
            "web" => ["string"],
            "estado" => ["boolean"],
            "a" => ["string"],
            "b" => ["string"],
            "c" => ["string"],
        ];
    }
}
