<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PuntoDeControl;

class PuntoDeControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PuntoDeControl::create([
            "nombre" => "Generación Muestra",
            "disponible" => 1,
            "orden" => 1,
        ]);
        PuntoDeControl::create([
            "nombre" => "Egreso Muestra",
            "disponible" => 1,
            "orden" => 2,
        ]);
        PuntoDeControl::create([
            "nombre" => "Ingreso Muestra",
            "disponible" => 1,
            "orden" => 3,
        ]);
        PuntoDeControl::create([
            "nombre" => "Egreso Institución",
            "disponible" => 1,
            "orden" => 4,
        ]);
        PuntoDeControl::create([
            "nombre" => "Recepción",
            "disponible" => 1,
            "orden" => 5,
        ]);
        PuntoDeControl::create([
            "nombre" => "Entrega",
            "disponible" => 1,
            "orden" => 6,
        ]);
    }
}
