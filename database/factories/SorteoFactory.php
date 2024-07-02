<?php
namespace Database\Factories;

use App\Models\Sorteo;
use App\Models\Premio;
use Illuminate\Database\Eloquent\Factories\Factory;

class SorteoFactory extends Factory
{
    protected $model = Sorteo::class;

    public function definition()
    {
        return [
            'id_premio' => Premio::factory(),
            'fecha_sorteo' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'estado' => 'pendiente',
            'activo' => $this->faker->boolean,
        ];
    }
}
