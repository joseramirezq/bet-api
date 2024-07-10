<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuscripcionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           'id_usuario' => 'required|exists:usuarios,id',
           'periodo' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'estado' => 'required|boolean',
            'monto_pagado' => 'required|numeric|min:0',
            'tipo_pago'=>'required',
            'metodo_pago' => 'nullable|string'
        ];
    }
}
