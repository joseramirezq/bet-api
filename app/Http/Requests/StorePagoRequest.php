<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePagoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_usuario' => 'required|exists:usuarios,id',
            'id_suscripcion' => 'required|exists:suscripciones,id',
            'monto' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string|max:50',
            'estado' => 'required|boolean',
        ];
    }
}
