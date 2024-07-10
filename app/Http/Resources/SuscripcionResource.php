<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class SuscripcionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'usuario' => new UsuarioResource($this->whenLoaded('usuario')),
            'pagos' => PagoResource::collection($this->whenLoaded('pagos')),
            'periodo' => $this->periodo,
            'fecha_inicio' => Carbon::parse($this->fecha_inicio)->format('d-m-Y'), // Formatear la fecha como día-mes-año
            'fecha_fin' => $this->fecha_fin ? Carbon::parse($this->fecha_fin)->format('d-m-Y') : null, // Formatear la fecha como día-mes-año
            'estado' => $this->estado,
            'monto_pagado' => $this->pagos->sum('monto'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
        ];
    }
}
