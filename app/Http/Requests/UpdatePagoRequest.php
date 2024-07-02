<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePagoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_usuario' => 'exists:usuarios,id',
            'id_suscripcion' => 'exists:suscripciones,id',
            'monto' => 'numeric',
            'fecha_pago' => 'date',
            'metodo_pago' => 'string|max:50',
            'estado' => 'boolean',
        ];
    }
}
