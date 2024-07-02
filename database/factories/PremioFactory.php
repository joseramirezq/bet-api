<?php

namespace Database\Factories;

use App\Models\Premio;
use Illuminate\Database\Eloquent\Factories\Factory;

class PremioFactory extends Factory
{
    protected $model = Premio::class;

    public function definition()
    {
        return [
            'nombre_premio' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'imagen_url' => $this->faker->imageUrl,
            'estado' => $this->faker->boolean,
        ];
    }
}
