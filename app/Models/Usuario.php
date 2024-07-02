<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable; // Importar el trait Notifiable

class Usuario extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;
     protected $table = 'usuarios';
    protected $fillable = [
        'tipo_documento', 'numero_documento', 'email', 'codigo', 'nombres',
        'apellido_paterno', 'apellido_materno', 'telefono', 'fecha_nacimiento',
        'genero', 'direccion', 'distrito', 'provincia', 'departamento', 'pais',
        'suscripcion_activa', 'rol', 'password_hash', 'estado'
    ];

    public function suscripciones()
    {
        return $this->hasMany(Suscripcion::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    public function ganadores()
    {
        return $this->hasMany(Ganador::class);
    }
}
