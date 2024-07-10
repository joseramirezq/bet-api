<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorteo extends Model
{
    use HasFactory;
    protected $table = 'sorteos';
    protected $fillable = [
        'fecha_sorteo', 'estado', 'activo'
    ];

    
    public function premios()
    {
        return $this->belongsToMany(Premio::class, 'premio_sorteos', 'id_sorteo', 'id_premio');
    }
    public function ganadores()
    {
        return $this->hasMany(Ganador::class);
    }
}
