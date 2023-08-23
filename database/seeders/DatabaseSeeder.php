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
        \App\Models\Paciente::factory(15)->create();
        \App\Models\Clinica::factory(15)->create();
        $this->call(TipoMuestraSeeder::class);
        $this->call(SubtipoMuestraSeeder::class);

        \App\Models\Muestra::factory(15)->create();
        $this->call(ServicioSeeder::class);
        $this->call(PuntoDeControlSeeder::class);
        \App\Models\Trazabilidad::factory(6)->create();
        // \App\Models\PuntoDeControl::factory(100)->create();

        $this->call(ObraSocialSeeder::class);
       
    }
}
