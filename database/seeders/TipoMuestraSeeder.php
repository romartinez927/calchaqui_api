<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TipoMuestra;

class TipoMuestraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoMuestra::create([
            "nombre" => "Anatomía Patológica",
            "disponible" => 1,
        ]);
        TipoMuestra::create([
            "nombre" => "Laboratorio",
            "disponible" => 1,
        ]);
        TipoMuestra::create([
            "nombre" => "Pericial",
            "disponible" => 1,
        ]);
    }
}
