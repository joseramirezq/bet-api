<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class PagoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_usuario' => $this->id_usuario,
            'id_suscripcion' => $this->id_suscripcion,
            'monto' => $this->monto,
            'fecha_pago' => Carbon::parse($this->fecha_pago)->format('d-m-Y'),
            'metodo_pago' => $this->metodo_pago,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
