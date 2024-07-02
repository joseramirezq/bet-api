<?php

namespace Database\Factories;

use App\Models\Ganador;
use App\Models\Usuario;
use App\Models\Sorteo;
use Illuminate\Database\Eloquent\Factories\Factory;

class GanadorFactory extends Factory
{
    protected $model = Ganador::class;

    public function definition()
    {
        return [
            'id_usuario' => Usuario::factory(),
            'id_sorteo' => Sorteo::factory(),
            'fecha_ganado' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'estado' => $this->faker->boolean,
        ];
    }
}
