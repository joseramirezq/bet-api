<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePremioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre_premio' => 'string|max:100',
            'descripcion' => 'string',
            'imagen_url' => 'string|max:255',
        ];
    }
}
