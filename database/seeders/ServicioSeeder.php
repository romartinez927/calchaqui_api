<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Servicio;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::create([
            "nombre" => "1er Piso",
            "disponible" => 1,
        ]);
        Servicio::create([
            "nombre" => "2do Piso",
            "disponible" => 1,
        ]);
        Servicio::create([
            "nombre" => "Consultorios Externos",
            "disponible" => 1,
        ]);
        Servicio::create([
            "nombre" => "Ecografía",
            "disponible" => 1,
        ]);
        Servicio::create([
            "nombre" => "Guardia / Emergentología",
            "disponible" => 1,
        ]);
        Servicio::create([
            "nombre" => "Imágenes",
            "disponible" => 1,
        ]);
        Servicio::create([
            "nombre" => "Quirófano",
            "disponible" => 1,
        ]);
        Servicio::create([
            "nombre" => "Tomografía",
            "disponible" => 1,
        ]);
        Servicio::create([
            "nombre" => "UTI",
            "disponible" => 1,
        ]);
    }
}
