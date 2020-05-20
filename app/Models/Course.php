<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
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
        'teacher_id',
        'title',
        'permalink',
        'image',
        'image_alt',
        'description',
        'video',
        'overview',
        'topics',
        'content',
        'price',
        'start_date',
        'duration',
        'position',
        'active',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
    ];

    /**
     * Set the image slug.
     *
     * @param string $value
     * @return void
     */
    public function setPermalinkAttribute($value)
    {
        $this->attributes['permalink'] = strtolower(str_replace(' ', '-', str_replace('.', '', $value)));
    }
}
