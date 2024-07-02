<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GanadorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_usuario' => $this->id_usuario,
            'id_sorteo' => $this->id_sorteo,
            'fecha_ganado' => $this->fecha_ganado,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
