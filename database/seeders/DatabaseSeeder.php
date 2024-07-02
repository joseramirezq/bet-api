<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Premio;
use App\Models\Sorteo;
use App\Models\Ganador;
use App\Models\Suscripcion;
use App\Models\Pago;
use App\Models\Slider;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear usuarios
        Usuario::factory(10)->create();

        // Crear premios
        Premio::factory(5)->create();

        // Crear sorteos
        Sorteo::factory(10)->create();

        // Crear suscripciones
        Suscripcion::factory(10)->create();

        // Crear pagos
        Pago::factory(20)->create();

        // Crear ganadores
        Ganador::factory(5)->create();

        // Crear sliders
        Slider::factory(5)->create();
    }
}
