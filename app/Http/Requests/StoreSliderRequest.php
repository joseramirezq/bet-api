<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:100',
            'descripcion' => 'string|nullable',
            'imagen_url' => 'required|string|max:255',
            'orden' => 'required|integer',
            'activo' => 'required|boolean',
             'estado' => 'boolean'
        ];
    }
}
