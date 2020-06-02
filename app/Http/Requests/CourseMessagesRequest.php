<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseMessagesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->redirect = url()->previous() . '#message';

        return [
            'course_id' => 'required|numeric',
            'name' => 'required|between:3,150',
            'email' => 'required|email',
            'whatsapp' => 'nullable|numeric',
            'message' => 'required|min:8',
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
            'course_id.required' => 'El id del curso es requerido',
            'course_id.numeric' => 'El valor del curso debe ser numérico',

            'name.required' => 'El nombre es obligatorio',
            'name.between' => 'El nombre debe ser entre :min a :max caracteres',

            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El formato del email es incorrecto',

            'whatsapp.numeric' => 'Solo se admiten números',

            'message.required' => 'El mensaje es obligatorio',
            'message.min' => 'El mensaje debe tener por lo menos :min caracteres',
        ];
    }
}
