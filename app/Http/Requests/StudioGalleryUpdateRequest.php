<?php

namespace App\Http\Requests;

use App\Models\StudioGallery;
use Illuminate\Foundation\Http\FormRequest;

class StudioGalleryUpdateRequest extends FormRequest
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
            'image' => 'nullable|mimes:jpeg, jpg, png, gif|max:12000',
            'image_alt' => 'required|between:8, 100',
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
        return StudioGallery::messages();
    }
}
