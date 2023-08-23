<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trazabilidad>
 */
class TrazabilidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "model_type" => fake()->randomElement($array = array ("App\Models\Muestra","App\Models\Paciente")),
            "model_id" => fake()->numberBetween(1, 30),
            "punto_de_control_id" => fake()->numberBetween(1, 6),
            "recibido_por" => fake()->name(),
            "entregado_por" => fake()->name(),
            "url_informe" => fake()->url(),
        ];
    }
}
