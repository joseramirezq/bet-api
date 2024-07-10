<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GanadorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'usuario' => new UsuarioResource($this->whenLoaded('usuario')),
            'sorteo' => new SorteoResource($this->whenLoaded('sorteo')),
            'premio' => new PremioResource($this->whenLoaded('premio')),
            'fecha_ganado' => $this->fecha_ganado,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
