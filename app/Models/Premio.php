<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    use HasFactory;
    protected $table = 'premios';
    protected $fillable = [
        'nombre_premio', 'descripcion', 'imagen_url', 'estado'
    ];

    public function sorteos()
    {
        return $this->belongsToMany(Sorteo::class, 'premio_sorteos', 'id_premio', 'id_sorteo');
    }
}
