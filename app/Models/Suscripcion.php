<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;
    protected $table = 'suscripciones';
    protected $fillable = [
        'id_usuario', 'fecha_inicio', 'fecha_fin', 'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
