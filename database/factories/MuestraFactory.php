<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paciente;
use App\Models\TipoMuestra;
use App\Models\SubtipoMuestra;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Muestra>
 */
class MuestraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $paciente = Paciente::all()->random();
        $tipo_muestra = TipoMuestra::all()->random();
        // $subtipo_muestra_id = SubtipoMuestra::where("tipo_muestra_id", $tipo_muestra->id)->value('id');
       
        return [
            "paciente_id" => $paciente->id,
            "tipo_muestra_id" => $tipo_muestra->id,
            "subtipo_muestra_id" => $tipo_muestra->subtipoMuestras->first()->id,
            "punto_generacion" => fake()->name(),
            "material" => fake()->name(),
            "medico" => fake()->name(),
            "preparador" => fake()->name(),
            "localizacion" => fake()->name(),
            "diagnostico" => fake()->name(),
            "observaciones" => fake()->text(),
            "frascos" => fake()->numberBetween(1, 30)
        ];
    }
}
