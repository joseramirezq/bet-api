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
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'date|nullable',
            'estado' => 'required|boolean',
        ];
    }
}
