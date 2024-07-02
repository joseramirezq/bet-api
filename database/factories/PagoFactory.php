<?php
namespace Database\Factories;

use App\Models\Pago;
use App\Models\Usuario;
use App\Models\Suscripcion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagoFactory extends Factory
{
    protected $model = Pago::class;

    public function definition()
    {
        return [
            'id_usuario' => Usuario::factory(),
            'id_suscripcion' => Suscripcion::factory(),
            'monto' => $this->faker->randomFloat(2, 10, 100),
            'fecha_pago' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'metodo_pago' => $this->faker->randomElement(['tarjeta', 'PayPal']),
            'estado' => $this->faker->boolean,
        ];
    }
}
