<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'image',
        'image_alt',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Set the user's password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public static function messages()
    {
        return [
            'first_name.required' => 'El nombre es obligatorio',
            'first_name.between' => 'El nombre debe ser entre :min a :max caracteres',

            'last_name.required' => 'El apellido es obligatorio',
            'last_name.between' => 'El apellido debe ser entre :min a :max caracteres',

            'email.required' => 'El email es obligatorio',
            'email.email' => 'Formato incorrecto',
            'email.unique' => 'El correo electrónico ya ha sido registrado, utilize otro.',

            'image.min' => 'La imagen debe ser mínimo de :min caracteres',
            'image_alt.between' => 'El texto alternativo de la imagen debe ser entre :min a :max caracteres',

            'password.required' => 'La contraseña es obligatoria',
            'password.between' => 'La contraseña debe ser entre :min a :max caracteres',
            'password.confirmed' => 'La contraseña debe coincidir con la confirmación',

            'password_confirmation.required' => 'La confirmación de contraseña es obligatoria',
            'password_confirmation.same' => 'Debe coincidir con la contraseña',
        ];
    }
}
