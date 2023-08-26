<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paciente;
use App\Models\TipoMuestra;
use App\Models\Muestra;
use App\Models\Trazabilidad;
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

        $muestra = Muestra::create([
            "paciente_id" => $paciente->id,
            "tipo_muestra_id" => $tipo_muestra->id,
            "subtipo_muestra_id" => $tipo_muestra->subtipoMuestras->first()->id,
            "punto_generacion" => $this->faker->name(),
            "material" => $this->faker->name(),
            "medico" => $this->faker->name(),
            "preparador" => $this->faker->name(),
            "atb" => $this->faker->lastName(),
            "localizacion" => $this->faker->name(),
            "diagnostico" => $this->faker->name(),
            "observaciones" => $this->faker->text(),
            "frascos" => $this->faker->numberBetween(1, 30)
        ]);

        // Crear una trazabilidad asociada a la muestra recién creada
        $trazabilidad = Trazabilidad::factory()->create([
            'model_type' => 'App\Models\Muestra',
            'model_id' => $muestra->id,
            'punto_de_control_id' => 1, // Punto de control deseado
            "entregado_por" => $muestra->preparador,
            "recibido_por" => $muestra->medico
        ]);

        return [
            // Atributos adicionales de la muestra, si los hay
        ];
    }
}
