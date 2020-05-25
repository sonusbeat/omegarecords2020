<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'whatsapp',
        'image',
        'image_name',
        'image_alt',
        'biography',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'seo_title',
        'seo_description',
        'seo_robots',
        'active',
    ];

    /**
     * Set the image name.
     *
     * @param string $value
     * @return void
     */
    public function setImageNameAttribute($value)
    {
        $this->attributes['image_name'] = strtolower(str_replace(' ', '-', str_replace('.', '', $value)));
    }

    /**
     * Set full name for the teacher
     *
     * @return string
     */
    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Set username for the teacher
     *
     * @return string
     */
    public function username()
    {
        $first_name = strtolower($this->first_name);
        $last_name = strtolower($this->last_name);

        return str_replace(' ', '-', $first_name. '-' . $last_name);
    }

    /**
     * Get the courses that belongs to the teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Get Teacher for public page
     *
     * @param integer $id
     * @return Query
     */
    public static function TeacherWithCoursesForPublic($id)
    {
        return self::where(['id' => $id, 'active' => true])
            ->select(
                'id',
                'first_name',
                'last_name',
                'email',
                'whatsapp',
                'image',
                'image_alt',
                'biography',
                'facebook',
                'instagram',
                'youtube',
                'seo_title',
                'seo_description',
                'seo_robots'
            )
            ->with(['courses' => function($query) {
                $query->select(
                    'id',
                    'teacher_id',
                    'title',
                    'permalink',
                    'image',
                    'image_alt'
                )
                ->where('active', true);
            }])
            ->first();
    }

    /**
     * Get the teacher with courses for admin
     *
     * @param integer $id
     *
     * @return Query
     */
    public static function TeacherWithCourses($id)
    {
        return self::where('id', $id)
            ->with(['courses' => function($query) {
                $query->select(['id', 'teacher_id', 'title', 'image', 'image_alt'])->get();
            }])
            ->first();
    }

    /**
     * Validation messages for the request
     *
     * @return array
     */
    public static function messages()
    {
        return [
            'first_name.required' => 'El nombre es obligatorio',
            'first_name.between' => 'El nombre debe ser de :min a :max caracteres',

            'last_name.required' => 'El apellido es obligatorio',
            'last_name.between' => 'El apellido debe ser de :min a :max caracteres',

            'email.required' => 'El email es obligatorio',
            'email.email' => 'Formato de email incorrecto',
            'email.max' => 'El email debe ser menor a :max caracteres',
            'email.unique' => 'El email ya existe, elija otro',

            'whatsapp.required' => 'El WhatsApp es obligatorio',
            'whatsapp.between' => 'El WhatsApp debe ser de :min a :max caracteres',
            'whatsapp.max' => 'El WhatsApp debe ser menor a :max caracteres',
            'whatsapp.unique' => 'El WhatsApp ya existe, elija otro',

            'image.required' => 'La imagen es obligatoria',
            'image.mimes' => 'Solo se permiten imagenes en jped, jpg, png, gif',
            'image.max' => '',

            'image_name.required' => 'El nombre de la imagen es obligatorio',
            'image_name.between' => 'El nombre de la imagen debe ser de :min a :max caracteres',
            'image_name.unique' => 'El nombre de la imagen ya existe, elija otro',

            'image_alt.required' => 'El texto alternativo de la imagen es obligatorio',
            'image_alt.between' => 'La imagen alternativa debe ser de :min a :max caracteres',

            'biography.required' => 'La biografía es obligatoria',
            'biography.min' => 'El nombre debe ser mayor a :min caracteres',

            'facebook.between' => 'El facebook debe ser de :min a :max caracteres',
            'facebook.unique' => 'El facebook ya existe, elija otro',

            'twitter.between' => 'El twitter debe ser de :min a :max caracteres',
            'twitter.unique' => 'El twitter ya existe, elija otro',

            'instagram.between' => 'El instagram debe ser de :min a :max caracteres',
            'instagram.unique' => 'El instagram ya existe, elija otro',

            'youtube.between' => 'El youtube debe ser de :min a :max caracteres',
            'youtube.unique' => 'El youtube ya existe, elija otro',

            'active.boolean' => 'Solo se permite 1 o 0',

            'seo_title.required' => 'El título seo es obligatorio',
            'seo_title.max' => 'El título debe ser menor a :max caracteres',

            'seo_description.required' => 'La descripción seo es obligatoria',
            'seo_description.max' => 'La descripción seo debe ser menor a :max carcateres',

            'seo_robots.required' => 'La opción de robots es obligatoria',
            'seo_robots.in' => 'La opción es incorrecta',
        ];
    }

    /**
     * Seo Options for form
     *
     * @return array
     */
    public static function seo_options()
    {
        return [
            'Indexar y Seguir' => 'index, follow',
            'No Indexar y Seguir' => 'noindex, follow',
            'Indexar y No Seguir' => 'index, nofollow',
            'No Index y No Seguir' => 'noindex, nofollow'
        ];
    }
}
