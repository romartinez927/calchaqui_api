<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SubtipoMuestra;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoMuestra>
 */
class TipoMuestraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $subtipo_muestra = SubtipoMuestra::all()->random();
        return [
            // "nombre" => fake()->randomElement(["Anatomía Patológica", "Laboratorio", "Pericial"]),
            // "disponible" => fake()->boolean(),
        ];
    }
}
