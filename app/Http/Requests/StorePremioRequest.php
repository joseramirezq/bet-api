<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePremioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre_premio' => 'required|string|max:100',
            'descripcion' => 'required|string',
           'imagen_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
