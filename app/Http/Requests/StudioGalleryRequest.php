<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudioGalleryRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required|between:4, 150',
            'slug' => 'required|between:4, 150',
            'description' => 'required|between:8, 200',
            'image' => 'nullable|mimes:jpeg, jpg, png, gif|max:10000',
            'image_alt' => 'nullable|between:8, 100',
            'active' => 'nullable|boolean',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'El título de la imagen es obligatorio',
            'title.between' => 'El título de la imagen debe ser de :min a :max caracteres',

            'slug.required' => 'El slug es obligatorio',
            'slug.between' => 'El slug de la imagen debe ser de :min a :max caracteres',

            'description.required' => 'La descripción de la imagen es obligatoria',
            'description.between' => 'El descripción de la imagen debe ser de :min a :max caracteres',

            'image.mimes' => 'Solo se permite imagenes en formato jpeg, jpg, png, gif',
            'image.max' => 'Solo se permite subir imagenes inferiores a 10 Megabytes',

            'image_alt.required' => 'El texto alternativo de la imagen es obligatoria',
            'image_alt.between' => 'El texto alternativo de la imagen debe ser de :min a :max caracteres',

            'active.boolean' => 'El valor para el campo activo debe ser 1 o 0',
        ];
    }
}
