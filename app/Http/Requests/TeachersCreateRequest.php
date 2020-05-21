<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class TeachersCreateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'first_name' => 'required|between: 3, 150',
            'last_name' => 'required|between: 3, 150',
            'email' => [
                'required',
                'email',
                'max:200',
                'unique:teachers,email'
            ],
            'whatsapp' => [
                'required',
                'between: 8, 150',
                'max:200',
                'unique:teachers,whatsapp'
            ],
            'image' => 'required|mimes:jpeg, jpg, png, gif|max:12000',
            'image_name' => [
                'required',
                'between: 3, 200',
                'unique:teachers,image_name'
            ],
            'image_alt' => 'required|between: 8, 200',
            'biography' => 'required|min: 8',
            'active' => 'nullable|boolean',

            // Social Media
            'facebook' => 'nullable|between:20, 200|unique:teachers,facebook',
            'twitter' => 'nullable|between:20, 200|unique:teachers,twitter',
            'instagram' => 'nullable|between:20, 200|unique:teachers,instagram',
            'youtube' => 'nullable|between:20, 200|unique:teachers,youtube',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return Teacher::messages();
    }
}
