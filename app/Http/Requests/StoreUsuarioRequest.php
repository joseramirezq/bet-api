<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tipo_documento' => 'required|string|max:20',
            'numero_documento' => 'required|string|max:20|unique:usuarios',
            'email' => 'required|string|email|max:100|unique:usuarios',
            'codigo' => 'required|string|max:50|unique:usuarios',
            'nombres' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'password' => 'required|string|min:8',
        ];
    }
}
