<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PremioSorteoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_sorteo' => $this->id_sorteo,
            'id_premio' => $this->id_premio,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sorteo' => new SorteoResource($this->whenLoaded('sorteo')),
            'premio' => new PremioResource($this->whenLoaded('premio')),
        ];
    }
}
