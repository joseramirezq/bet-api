<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PremioResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre_premio' => $this->nombre_premio,
            'descripcion' => $this->descripcion,
            'imagen_url' => $this->imagen_url,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
