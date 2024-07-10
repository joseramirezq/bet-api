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
            'tipo_documento' => 'required|string|max:100',
            'numero_documento' => 'required|string|max:20|unique:usuarios',
            'email' => 'required|string|email|max:100|unique:usuarios',
            'codigo' => 'required|string|max:50',
            'nombres' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'genero' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'distrito' => 'nullable|string|max:100',
            'provincia' => 'nullable|string|max:100',
            'departamento' => 'nullable|string|max:100',
            'pais' => 'nullable|string|max:100',
            'suscripcion_activa' => 'boolean',
            'rol' => 'required|string|max:50',
            'password' => 'required|string|min:8|confirmed',
            'estado' => 'boolean'
        ];
    }
}
