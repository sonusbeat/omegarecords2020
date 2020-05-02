<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudioGallery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
}
