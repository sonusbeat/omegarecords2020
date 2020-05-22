<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;

class TeachersUpdateRequest extends FormRequest
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
        $id = $route->teacher ? $route->teacher->id : null;

        return [
            'first_name' => 'required|between: 3, 150',
            'last_name' => 'required|between: 3, 150',
            'email' => [
                'required',
                'email',
                'max:200',
                'unique:teachers,email,'.$id
            ],
            'whatsapp' => [
                'required',
                'between: 8, 150',
                'max:200',
                'unique:teachers,whatsapp,'.$id
            ],
            'image' => 'nullable|mimes:jpeg, jpg, png, gif|max:12000',
            'image_name' => [
                'required',
                'between: 3, 200',
                'unique:teachers,image_name,'.$id
            ],
            'image_alt' => 'required|between: 8, 200',
            'biography' => 'required|min: 8',
            'active' => 'nullable|boolean',

            // Social Media
            'facebook' => 'nullable|between:20, 200|unique:teachers,facebook,'.$id,
            'twitter' => 'nullable|between:20, 200|unique:teachers,twitter,'.$id,
            'instagram' => 'nullable|between:20, 200|unique:teachers,instagram,'.$id,
            'youtube' => 'nullable|between:20, 200|unique:teachers,youtube,'.$id,

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
