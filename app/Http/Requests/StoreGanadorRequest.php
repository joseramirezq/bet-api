<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGanadorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_usuario' => 'required|exists:usuarios,id',
            'id_sorteo' => 'required|exists:sorteos,id',
            'fecha_ganado' => 'required|date',
            'estado' => 'required|boolean',
        ];
    }
}
