<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    protected $model = Slider::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
            'imagen_url' => $this->faker->imageUrl,
            'orden' => $this->faker->numberBetween(1, 10),
            'activo' => $this->faker->boolean,
        ];
    }
}
