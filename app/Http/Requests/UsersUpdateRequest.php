<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class UsersUpdateRequest extends FormRequest
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
    public function rules(Route $route)
    {
        return [
            'first_name' => 'required|between:3, 50',
            'last_name' => 'required|between:3, 50',
            'image' => 'nullable|min:3',
            'image_alt' => 'nullable|between:3, 150',
            'email' => 'required|email|unique:users,email,'.$route->user->id,
            'password' => 'nullable|between: 8, 16|confirmed',
            'password_confirmation' => 'nullable|same:password',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return User::messages();
    }
}
