<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PagoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_usuario' => $this->id_usuario,
            'id_suscripcion' => $this->id_suscripcion,
            'monto' => $this->monto,
            'fecha_pago' => $this->fecha_pago,
            'metodo_pago' => $this->metodo_pago,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
