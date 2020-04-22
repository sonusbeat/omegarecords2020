<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
        return [
            'name'    => 'required|between:4,50',
            'email'   => 'required|email',
            'mobile'  => 'required|numeric|digits_between:4,30',
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
            'name.required' => 'Escriba su nombre por favor',
            'name.between'  => 'Escriba de :min a :max caracteres por favor',

            'email.required' => 'Escriba su correo electrónico por favor',
            'email.email'    => 'Formato de email incorrecto',

            'mobile.required' => 'Proporcionenos su número celular por favor',
            'mobile.numeric'   => 'Escriba solo números sin vacios',
            'mobile.digits_between' => 'Escriba de :min a :max números por favor',

            'message.required' => 'Escriba su mensaje por favor',
            'message.min' => 'Su mensaje debe contener por lo menos 8 caracteres',
        ];
    }
}
