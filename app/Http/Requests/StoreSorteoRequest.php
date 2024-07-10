<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSorteoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //'id_premio' => 'required|exists:premios,id',
            'fecha_sorteo' => 'required|date',
            'estado' => 'required|string|max:50',
            'activo' => 'required|boolean',
            'premios' => 'required|array',
            'premios.*' => 'exists:premios,id', 
        ];
    }
}

