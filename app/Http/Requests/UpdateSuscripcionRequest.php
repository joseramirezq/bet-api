<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSuscripcionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_usuario' => 'exists:usuarios,id',
            'periodo' => 'nullable',
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date|nullable',
            'estado' => 'boolean',
            'monto_pagado' => 'required|numeric|min:0',
            'tipo_pago'=>'required'
        ];
    }
}
