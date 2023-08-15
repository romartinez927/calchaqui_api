<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubtipoMuestra;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Paciente::factory(100)->create();
        \App\Models\Clinica::factory(100)->create();
        \App\Models\SubtipoMuestra::factory(10)->create();

        $subtipo_muestra = SubtipoMuestra::all()->random();
        \App\Models\TipoMuestra::factory()->create([
            'nombre' => 'Anatomía Patológica',
            "subtipo_muestra_id" => $subtipo_muestra->id,
            'disponible' => 1,
        ]);

        \App\Models\TipoMuestra::factory()->create([
            'nombre' => 'Laboratorio',
            "subtipo_muestra_id" => $subtipo_muestra->id,
            'disponible' => 1,
        ]);

        \App\Models\TipoMuestra::factory()->create([
            'nombre' => 'Pericial',
            "subtipo_muestra_id" => $subtipo_muestra->id,
            'disponible' => 1,
        ]);

        \App\Models\Muestra::factory(100)->create();
        \App\Models\Servicio::factory(100)->create();
        \App\Models\PuntoDeControl::factory(100)->create();

       
    }
}
