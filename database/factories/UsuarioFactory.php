<?php
namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'tipo_documento' => $this->faker->randomElement(['DNI', 'CE', 'PAS']),
            'numero_documento' => $this->faker->numerify('########'),
            'email' => $this->faker->unique()->safeEmail,
            'codigo' => Str::random(10),
            'nombres' => $this->faker->firstName,
            'apellido_paterno' => $this->faker->lastName,
            'apellido_materno' => $this->faker->lastName,
            'telefono' => $this->faker->phoneNumber,
            'fecha_nacimiento' => $this->faker->date,
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'direccion' => $this->faker->address,
            'distrito' => $this->faker->city,
            'provincia' => $this->faker->state,
            'departamento' => $this->faker->state,
            'pais' => $this->faker->country,
            'suscripcion_activa' => $this->faker->boolean,
            'rol' => $this->faker->randomElement(['usuario', 'admin']),
            'password_hash' => Hash::make('password'),
            'estado' => $this->faker->boolean,
        ];
    }
}

