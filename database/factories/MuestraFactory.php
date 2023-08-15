<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paciente;
use App\Models\TipoMuestra;
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
       
        return [
            "paciente_id" => $paciente->id,
            "tipo_muestra_id" => $tipo_muestra->id,
            "subtipo_muestra" => fake()->name(),
            "punto_generacion" => fake()->name(),
            "material" => fake()->name(),
            "localizacion" => fake()->name(),
            "diagnostico" => fake()->name(),
            "observaciones" => fake()->text(),
            "frascos" => fake()->numberBetween(1, 30)
        ];
    }
}
