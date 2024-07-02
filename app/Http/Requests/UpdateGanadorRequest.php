<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGanadorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_usuario' => 'exists:usuarios,id',
            'id_sorteo' => 'exists:sorteos,id',
            'fecha_ganado' => 'date',
            'estado' => 'boolean',
        ];
    }
}
