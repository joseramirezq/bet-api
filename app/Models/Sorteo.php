<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorteo extends Model
{
    use HasFactory;
    protected $table = 'sorteos';
    protected $fillable = [
        'id_premio', 'fecha_sorteo', 'estado', 'activo'
    ];

    public function premio()
    {
        return $this->belongsTo(Premio::class);
    }

    public function ganadores()
    {
        return $this->hasMany(Ganador::class);
    }
}
