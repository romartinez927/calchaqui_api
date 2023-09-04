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
        \App\Models\Paciente::factory(10)->create();
        $this->call(UserSeeder::class);
        \App\Models\Clinica::factory(2)->create();
        $this->call(PuntoDeControlSeeder::class);
        $this->call(TipoMuestraSeeder::class);
        $this->call(SubtipoMuestraSeeder::class);
        $this->call(ServicioSeeder::class);

        \App\Models\Muestra::factory()->count(10)->create();

        // \App\Models\Trazabilidad::factory(1)->create();

        $this->call(ObraSocialSeeder::class);
       
    }
}
