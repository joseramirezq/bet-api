<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SorteoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fecha_sorteo' => $this->fecha_sorteo,
            'estado' => $this->estado,
            'activo' => $this->activo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'premios' => PremioResource::collection($this->whenLoaded('premios'))
        ];
    }
}
