<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class EquipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->type == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Route $route)
    {
        return [
            'name' => 'required|unique:equipment,name,' . $route->equipment,
            'equipment_category_id' => 'required|numeric',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.unique' => 'El nombre ya existe elija otro',
            'equipment_category_id.required' => 'La categoría es obligatoria, seleccione una',
            'equipment_category_id.numeric' => 'El valor de la categoría debe ser numérico',
        ];
    }
}
