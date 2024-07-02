<?php

namespace Database\Factories;

use App\Models\Suscripcion;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuscripcionFactory extends Factory
{
    protected $model = Suscripcion::class;

    public function definition()
    {
        return [
            'id_usuario' => Usuario::factory(),
            'fecha_inicio' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'fecha_fin' => $this->faker->dateTimeBetween('now', '+1 year'),
            'estado' => $this->faker->boolean,
        ];
    }
}
