<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremioSorteo extends Model
{
    use HasFactory;
    protected $table = 'premio_sorteos';
    protected $fillable = [
        'id_sorteo', 'id_premio', 'estado'
    ];

    public function sorteo()
    {
        return $this->belongsTo(Sorteo::class, 'id_sorteo');
    }

    public function premio()
    {
        return $this->belongsTo(Premio::class, 'id_premio');
    }
}
