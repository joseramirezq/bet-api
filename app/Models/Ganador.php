<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganador extends Model
{
    use HasFactory;
    protected $table = 'ganadores';
    protected $fillable = [
        'id_usuario', 'id_sorteo', 'fecha_ganado', 'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function sorteo()
    {
        return $this->belongsTo(Sorteo::class);
    }
}
