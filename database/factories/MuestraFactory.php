<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paciente;
use App\Models\TipoMuestra;
use App\Models\Muestra;
use App\Models\Trazabilidad;
use App\Models\Servicio;
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
        $punto_generacion = Servicio::all()->random();

        return [
            "paciente_id" => $paciente->id,
            "tipo_muestra_id" => $tipo_muestra->id,
            "subtipo_muestra_id" => $tipo_muestra->subtipoMuestras->first()->id,
            "punto_generacion_id" => $punto_generacion->id,
            "material" => $this->faker->name(),
            "medico" => $this->faker->name(),
            "preparador" => $this->faker->name(),
            "atb" => $this->faker->lastName(),
            "localizacion" => $this->faker->name(),
            "diagnostico" => $this->faker->name(),
            "observaciones" => $this->faker->text(),
            "frascos" => $this->faker->numberBetween(1, 10)
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Muestra $muestra) {
            // Crear una trazabilidad asociada a la muestra recién creada
            Trazabilidad::factory()->create([
                'model_type' => 'App\Models\Muestra',
                'model_id' => $muestra->id,
                'punto_de_control_id' => 1, // Punto de control deseado
                "entregado_por" => $muestra->preparador,
                "recibido_por" => $muestra->medico
            ]);
        });
    }
}
