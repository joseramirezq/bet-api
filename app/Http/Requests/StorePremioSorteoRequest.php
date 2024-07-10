<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePremioSorteoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_sorteo' => 'required|exists:sorteos,id',
            'id_premio' => 'required|exists:premios,id',
            'estado' => 'required|boolean',
        ];
    }
}
