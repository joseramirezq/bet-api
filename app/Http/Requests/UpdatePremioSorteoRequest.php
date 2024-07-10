<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePremioSorteoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_sorteo' => 'sometimes|exists:sorteos,id',
            'id_premio' => 'sometimes|exists:premios,id',
            'estado' => 'sometimes|boolean',
        ];
    }
}
