<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'string|max:100',
            'descripcion' => 'string|nullable',
            'imagen_url' => 'string|max:255',
            'orden' => 'integer',
            'activo' => 'boolean',
              'estado' => 'boolean'
        ];
    }
}

