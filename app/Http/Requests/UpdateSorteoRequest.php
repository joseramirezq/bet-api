<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSorteoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_premio' => 'exists:premios,id',
            'fecha_sorteo' => 'date',
            'estado' => 'string|max:50',
            'activo' => 'boolean',
        ];
    }
}
