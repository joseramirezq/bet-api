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
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date|nullable',
            'estado' => 'boolean',
        ];
    }
}
