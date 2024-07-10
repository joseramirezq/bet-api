<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tipo_documento' => 'required|string|max:100',
            'numero_documento' => [
                'required',
                'string',
                'max:20',
                Rule::unique('usuarios')->ignore($this->usuario->id), // Ignorar el usuario actual
            ],
            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('usuarios')->ignore($this->usuario->id), // Ignorar el usuario actual
            ],
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
            'suscripcion_activa' => 'required|boolean',
            'rol' => 'required|string|max:50',
            'estado' => 'required|boolean'
        ];
    }
}
