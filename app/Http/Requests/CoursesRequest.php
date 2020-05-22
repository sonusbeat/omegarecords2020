<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;

class CoursesRequest extends FormRequest
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
     * @param Route $route
     * @return array
     */
    public function rules(Route $route)
    {
        $id = $route->course ? $route->course->id : null;

        return [
            'teacher_id' => 'required|numeric',
            'title' => 'required|between: 4, 150',
            'permalink' => [
                'required',
                'between: 4, 150',
                'unique:courses,permalink,'.$id,
            ],
            'description' => 'required|min: 8',
            'video' => 'nullable|max: 250',
            'price' => 'required|numeric',
            'duration' => 'nullable|max:150',
            'overview' => 'required|min: 8',
            'topics' => 'required|min: 8',
            'content' => 'required|min: 8',
            'position' => 'nullable|numeric',

            // SEO
            'seo_title' => 'required|max:60',
            'seo_description' => 'required|max:160',
            'seo_robots' => [
                'required',
                Rule::in([
                    'index, follow',
                    'noindex, follow',
                    'index, nofollow',
                    'noindex, nofollow'
                ])
            ],

            'active' => 'nullable|boolean',
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
            'teacher_id.required' => 'Seleccione un maestro',
            'teacher_id.numeric' => 'Solo se permiten enviar números',

            'title.required' => 'El título es obligatorio',
            'title.between' => 'El título debe ser de :min a :max caracteres',

            'permalink.required' => 'El URL es obligatorio',
            'permalink.between' => 'El URL debe ser de :min a :max caracteres',
            'permalink.unique' => 'El URL y nombre de imagen ya existe, elija otro',

            'description.required' => 'La descripción es obligatoria',
            'description.min' => 'La descripción debe ser mínimo de :min caracateres',

            'video.max' => 'El video no debe exeder :max caracteres',

            'price.required' => 'El precio es obligatorio',
            'price.numeric' => 'Solo se permiten números',

            'duration.max' => 'La duración no debe ser menor a :max caracteres',

            'overview.required' => 'La vision general es obligatoria',
            'overview.min' => 'La vision general debe ser mínimo de :min caracateres',

            'topics.required' => 'El tema es obligatorio',
            'topics.min' => 'El tema debe ser mínimo de :min caracateres',

            'content.required' => 'El contenido es obligatorio',
            'content.min' => 'El contenido debe ser mínimo de :min caracateres',

            'position.numeric' => 'La posición debe ser un número',

            // SEO
            'seo_title.required' => 'El título seo es obligatorio',
            'seo_title.max' => 'El título debe ser menor a :max caracteres',

            'seo_description.required' => 'La descripción seo es obligatoria',
            'seo_description.max' => 'La descripción seo debe ser menor a :max carcateres',

            'seo_robots.required' => 'La opción de robots es obligatoria',
            'seo_robots.in' => 'La opción es incorrecta',

            'active.boolean' => 'El valor debe ser 1 o 0',
        ];
    }
}
