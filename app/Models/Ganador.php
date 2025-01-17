<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganador extends Model
{
    use HasFactory;
    protected $table = 'ganadores';
    protected $fillable = [
          'id_usuario', 'id_sorteo', 'id_premio', 'fecha_ganado', 'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    
    public function sorteo()
    {
        return $this->belongsTo(Sorteo::class, 'id_sorteo');
    }
    public function premio()
    {
        return $this->belongsTo(Premio::class, 'id_premio');
    }
}