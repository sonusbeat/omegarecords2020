<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudioGallery extends Model
{
    use \Czim\Listify\Listify;

    public function __construct(array $attributes = array(), $exists = false) {

        parent::__construct($attributes, $exists);

        $this->initListify();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position',
        'title',
        'slug',
        'image',
        'image_alt',
        'description',
        'active',
    ];

    /**
     * Set the image slug.
     *
     * @param string $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = strtolower(str_replace(' ', '-', str_replace('.', '', $value)));
    }

    /**
     * Validation messages for Studio Gallery
     *
     * @return array
     */
    public static function messages() {
        return [
            'title.required' => 'El título de la imagen es obligatorio',
            'title.between' => 'El título de la imagen debe ser de :min a :max caracteres',

            'slug.required' => 'El slug es obligatorio',
            'slug.between' => 'El slug de la imagen debe ser de :min a :max caracteres',

            'description.required' => 'La descripción de la imagen es obligatoria',
            'description.between' => 'El descripción de la imagen debe ser de :min a :max caracteres',

            'image.required' => 'La imagen es obligatoria',
            'image.mimes' => 'Solo se permite imagenes en formato jpeg, jpg, png, gif',
            'image.max' => 'Solo se permite subir imagenes inferiores a 10 Megabytes',

            'image_alt.required' => 'El texto alternativo de la imagen es obligatorio',
            'image_alt.between' => 'El texto alternativo de la imagen debe ser de :min a :max caracteres',

            'active.boolean' => 'El valor para el campo activo debe ser 1 o 0',
        ];
    }
}
